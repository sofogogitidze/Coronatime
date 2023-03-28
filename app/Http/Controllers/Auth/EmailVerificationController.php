<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\View\View;
use App\Http\Controllers\Controller;


class EmailVerificationController extends Controller
{
	public function verify(EmailVerificationRequest $request): View
	{
		$request->fulfill();
		return view('pages.email_verified');
	}

	public function show(): View
	{
		return view('pages.email_sent');
	}

	public function verified(): View
	{
		return view('pages.email_verified');
	}
}
