<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChangeLanguageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_change_language()
	{
		$response = $this->get('/change-locale/ka')->assertRedirect('/');
		$response->assertSessionHas('lang', 'ka');
	}

	public function test_user_cant_set_unavailable_language()
	{
		$response = $this->get('/change-locale/ua')->assertRedirect('/');
		$response->assertSessionHas('lang', 'en');
	}
}
