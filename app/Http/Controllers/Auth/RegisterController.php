<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
	public function show(): View
	{
		return view('register.create');
	}

	public function register(RegisterRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$user = User::create($validated);

		event(new Registered($user));

		auth()->login($user);

		return redirect(route('email.sent'));
	}
}
