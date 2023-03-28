<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class VerificationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_it_sends_the_verification_email()
	{
		$this->withoutExceptionHandling();

		$user = User::factory()->make();
		Notification::fake();
		Notification::assertNothingSent();

		$this->post(
			route('register'),
			[
				'username'                  => $user->username,
				'email'                     => $user->email,
				'password'                  => 'testing',
				'confirm_password'          => 'testing',
			]
		);

		$user = User::firstWhere('email', $user->email);

		Notification::assertSentTo($user, VerifyEmailNotification::class);

		Notification::assertTimesSent(1, VerifyEmailNotification::class);
	}

    public function test_show_email_sent_page()
	{
		$user = User::factory()->make();
		$this
			->from(route('register.show'))
			->post(route('register'), [
				$user,
			]);
		$response = $this->actingAs($user)->get(route('email.sent'));
		$response->assertSuccessful()->assertSee('We have sent you confirmation email');
	}

    public function test_show_email_verified_page()
	{
		$user = User::factory()->make();
		$this
			->from(route('register.show'))
			->post(route('register'), [
				$user,
			]);
		$response = $this->actingAs($user)->get(route('email.verified'));
		$response->assertSuccessful()->assertSee('Your email has been verified');
	}

    public function test_user_can_verify()
	{
        Notification::fake();
                 $user = User::factory()->make([
                         'username'         => 'temo',
                         'email'            => 'temo@redberry.ge',
                         'password'         => 'password',
                         'email_verified_at'=> null,
                 ]);
                 $this->assertFalse($user->hasVerifiedEmail());
                $this->post(route('register', [
                    'username'             => $user->username,
                    'email'                => $user->email,
                    'password'             => $user->password,
                    'confirm_password'=> $user->password,
            ]));
            $user = User::where('username', 'temo')->first();

                 Notification::assertSentTo(
                         [$user],
                         VerifyEmailNotification::class
                 );
                 $this->assertFalse($user->hasVerifiedEmail());
                 $notification = Notification::sent($user, VerifyEmailNotification::class)->first();
                 $activationUrl = $notification->toMail($user)->actionUrl;
                 $this->get($activationUrl);
	}
}
