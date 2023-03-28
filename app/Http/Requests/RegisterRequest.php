<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'username'          => 'required|unique:users,username|min:3|',
			'email'             => 'required|unique:users,email|email',
			'password'          => 'required|same:confirm_password|min:3',
		];
	}

	public function messages()
	{
		return [
			'username.required' => __('texts.username_required'),
			'username.min'      => __('texts.username_required'),
			'username.unique'   => __('texts.username_is_taken'),
			'email.unique'      => __('texts.email_is_taken'),
			'email.required'    => __('texts.field_required'),
			'password.required' => __('texts.field_required'),
			'password.same'     => __('texts.confirm_must_be_same'),
		];
	}
}
