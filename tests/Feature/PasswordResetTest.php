<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_receives_an_email_with_a_password_reset_link()
	{
		$this->withoutExceptionHandling();
		User::factory()->create([
			'email'    => 'user@domain.com',
			'password' => bcrypt('oldpassword'),
		]);

		$token = Password::createToken(User::first());

		Event::fake();

		$response = $this->post(route('password.update'), [
			'email'                       => 'user@domain.com',
			'password'                    => 'newpassword',
			'password_confirmation'       => 'newpassword',
			'token'                       => $token,
		]);

		$response->assertRedirect(route('reset.verified'));

		$this->assertTrue(Hash::check('newpassword', User::first()->password));
		$this->assertFalse(Hash::check('oldpassword', User::first()->password));

		Event::assertDispatched(PasswordReset::class);
	}

	public function test_show_password_reset_request_page()
	{
		$this
			->get(route('password.request'))
			->assertSuccessful()
			->assertSee('Reset Password')
			->assertSee('Email')
			->assertSee('Send reset link')
		;
	}

	public function test_submit_password_reset_request_invalid_email()
	{
		$random = Str::random(40);
		$this
			->followingRedirects()
			->from(route('password.request'))
			->post(route('password.email'), [
				'email' => $random,
			])
			->assertSuccessful()
			->assertSee(__('validation.email', [
				'attribute' => 'email',
			]));
	}

	public function test_submit_password_reset_request_email_not_found()
	{
		$this
			->followingRedirects()
			->from(route('password.request'))
			->post(route('password.email'), [
				'email' => 'fakemail@mail.com',
			])
			->assertSuccessful()
			->assertSee("We can't find a user with that email address.");
	}

	public function test_submit_password_reset_request()
	{
		$user = User::factory()->create();

		$this
			->followingRedirects()
			->from(route('password.request'))
			->post(route('password.email'), [
				'email' => $user->email,
			])
			->assertSuccessful()
			->assertSee('We have sent you confirmation email');
	}

	public function test_show_password_reset_page()
	{
		$user = User::factory()->create();

		$token = Password::broker()->createToken($user);

		$this
			->get(route('password.reset', [
				'token' => $token,
			]))
			->assertSuccessful()
			->assertSee('Reset')
			->assertSee('Email')
			->assertSee('Enter new password')
			->assertSee('Repeat new password');
	}
}
