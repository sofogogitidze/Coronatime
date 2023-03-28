<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function login(LoginRequest $request)
	{
		$validated = $request->validated();

		$login = $validated['username'];
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$fields = [
			$field     => $login,
			'password' => $validated['password'], ];

		if (auth()->attempt($fields))
		{
			session()->regenerate();

			$user = Auth::getProvider()->retrieveByCredentials($fields);

			Auth::login($user, $request->get('remember'));
			return redirect(route('worldwide.statistics'))->with('success', 'Welcome back!');
		}
		return back()->withErrors(['failed' => __('texts.invalid_username_or_password')]);
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect(route('home'));
	}
}
