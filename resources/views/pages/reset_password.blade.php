<x-layout>
    <x-reset-layout ref="{{route('home')}}">
        <form method="POST" action="{{route('password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type='hidden' name='email' value="{{$email}}">
            <x-form.input
                name="{{__('texts.enter_new_password')}}"
                input="password"
                placeholder="{{__('texts.fill_in_password')}}"/>
            <label
                class="block mb-2 font-bold text-md xl:text-md text-gray"
                for="confirm_password">
                {{__('texts.repeat_new_password')}}
            </label>
            <input
                class="mb-6 border border-gray-200 p-2 w-full rounded placeholder:text-sm focus:border-blue-700 focus:outline-none"
                name="password_confirmation"
                type="password"
                placeholder="{{__('texts.repeat_password')}}"/>
            <x-form.button>{{__('texts.reset')}}</x-form.button>
        </form>
    </x-reset-layout>
</x-layout>
