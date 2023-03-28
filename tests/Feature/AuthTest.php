<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_register()
	{
		$this->withoutExceptionHandling();

		$this->postJson(route('register'), [
			'username'         => 'example',
			'email'            => 'example@gmail.com',
			'password'         => 'password',
			'confirm_password' => 'password',
		]);

		$this->assertDatabaseHas('users', [
			'username'         => 'example',
		]);
	}

    public function test_user_can_login()
	{
		$attributes = User::factory()->create();

		$this->post(route('login'), [$attributes]);

		$this->assertDatabaseHas(
			'users',
			[
				'username' => $attributes['username'],
			]
		);
	}

	public function test_user_can_logout()
	{
		$user = User::factory()->make();
		$this->be($user);

		$this->post(route('logout'))
			->assertRedirect(route('home'));
		$this->assertGuest();
	}

    public function test_user_cannot_login_with_incorrect_password()
	{
		$user = User::factory()->create([
			'email'    => 'emaiil@gmail.com',
			'password' => bcrypt('i-love-laravel'),
		]);
		$response = $this->from('/')->post('/login', [
			'email'    => $user->email,
			'password' => 'invalid-password',
		]);
		$response->assertRedirect('/');
		$response->assertSessionHasErrors();
		$this->assertGuest();
	}

    public function test_user_can_see_country_statistics()
	{
		$user = User::factory()->make();
		$this->be($user);

		$response = $this->actingAs($user)->get(route('country.statistics'));
		$response->assertSuccessful()
			->assertSee('Recovered')
			->assertSee('Critical')
			->assertSee('Deaths')
			->assertSee('Worldwide');
		$this->assertAuthenticatedAs($user);
	}

    public function test_user_can_see_worldwide_statistics()
	{
		$user = User::factory()->make();
		$this->be($user);

		$response = $this->actingAs($user)->get(route('worldwide.statistics'));
		$response->assertSuccessful()
			->assertSee('New cases')
			->assertSee('Recovered')
			->assertSee('Death')
			->assertSee('Critical');
		$this->assertAuthenticatedAs($user);
	}

    public function test_user_can_login_with_correct_credentials()
	{
		$user = User::factory()->create([
			'email'             => 'laravel@gmail.com',
			'password'          => 'password',
			'email_verified_at' => now()->subDay(),
		]);

		$response = $this->post('/login', [
			'email'    => $user->email,
			'password' => 'password',
		]);

		$response->assertRedirect(route('worldwide.statistics'));
		$this->assertAuthenticatedAs($user);
	}

    public function test_user_can_see_registration_page()
	{
		$this->get(route('register.show'))
			->assertSuccessful()
			->assertSee('Username')
			->assertSee('Email')
			->assertSee('Password')
			->assertSee('Repeat password');
	}

    public function test_user_can_view_a_login_form()
	{
		$response = $this->get('/');

		$response->assertSuccessful();

		$response->assertViewIs('pages.welcome');
	}

    public function test_user_cannot_view_a_login_form_when_authenticated()
	{
		$user = User::factory()->make();

		$response = $this->actingAs($user)->get(route('home'));

		$response->assertRedirect(route('worldwide.statistics'));
	}
}
