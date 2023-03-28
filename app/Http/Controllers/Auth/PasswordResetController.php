<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
	public function show(): View
	{
		return view('pages.forgot_password');
	}

	public function submit(Request $request): RedirectResponse
	{
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? redirect()->route('reset.email_sent')->with('status', __($status))
			: back()->withErrors(['email' => __($status)]);
	}

	public function showReset(Request $request, string $token): View
	{
		return view('pages.reset_password', ['token' => $token, 'email' => $request->email]);
	}

	public function update(Request $request): RedirectResponse
	{
		$request->validate([
			'token'    => 'required',
			'email'    => 'required',
			'password' => 'required|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => $password,
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('reset.verified')->with('status', __($status))
			: back()->withErrors(['email' => [__($status)]]);
	}
}
