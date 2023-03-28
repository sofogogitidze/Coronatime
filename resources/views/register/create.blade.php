<x-layout>
    <x-sessions-layout>
        <div class="mt-14 xl:h-[550px] flex flex-col justify-between mr-3">
            <div class="xl:w-[700px]">
                <p class="text-xl xl:text-2xl font-black">{{__('texts.welcome_to_coronatime')}}</p>
                <p class="text-md xl:text-xl xl:text-xl font-normal text-gray-400 mb-2 mt-2 ">{{__('texts.enter_info_to_sign_up')}}</p>
            </div>

            <section class="xl:w-4/5">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <x-form.input
                        name="{{__('texts.username')}}"
                        input="username"
                        placeholder="{{__('texts.unique_username')}}"/>
                    <x-form.input
                        name="{{__('texts.email')}}"
                        input="email"
                        placeholder="{{__('texts.enter_email')}}"/>
                    <x-form.input
                        name="{{__('texts.password')}}"
                        input="password"
                        placeholder="{{__('texts.fill_in_password')}}"/>
                    <label
                        class="block mb-2 font-bold text-md xl:text-md text-gray"
                        for="confirm_password">
                        {{__('texts.repeat_password')}}
                    </label>
                    <input
                        class="mb-6 border border-gray-200 p-2 w-full rounded placeholder:text-sm focus:border-blue-700 focus:outline-none"
                        name="confirm_password"
                        type="password"
                        placeholder="{{__('texts.repeat_password')}}"/>
                    <x-form.button>{{__('texts.sign_up')}}</x-form.button>
                </form>

                <p class="text-center text-gray-500 font-light mt-2">{{__('texts.already_have_account')}}?
                    <a class="font-bold text-black"
                       href="{{route('home')}}">{{__('texts.log_in')}}</a>
                </p>
            </section>

        </div>
    </x-sessions-layout>
</x-layout>
