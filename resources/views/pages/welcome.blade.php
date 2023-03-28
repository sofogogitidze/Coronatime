<x-layout>
    <x-sessions-layout>
        <div class="mt-14 xl:h-[420px] h-[500px] flex flex-col justify-between mr-3">
            <div class="xl:w-[700px]">
                <p class="text-xl xl:text-2xl font-black">{{__('texts.welcome_to_coronatime')}}!</p>
                <p class="text-md xl:text-xl font-normal text-gray-400 mt-2 mb-2">{{__('texts.enter_details')}}</p>
            </div>


            <section class="w-full xl:w-4/5">
                <form method="POST" action="{{route('login')}}" >
                    @csrf
                    <x-form.input
                        name="{{__('texts.enter_email_or_username')}}"
                        input="username"
                        placeholder="{{__('texts.enter_email')}}"/>
                    <x-form.input
                        name="{{__('texts.password')}}"
                        input="password"
                        placeholder="{{__('texts.fill_in_password')}}"/>
                    <div class="text-red-500 mb-2">
                        @error('failed')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="flex justify-between mb-3">
                        <x-form.checkbox/>
                        <a href="{{route('password.request')}}"
                           class="text-blue-600">
                            {{__('texts.forgot_password')}}?
                        </a>
                    </div>
                    <x-form.button>{{__('texts.log_in')}}</x-form.button>
                </form>

                <p
                    class="text-center text-gray-500 font-light mt-4">{{__('texts.dont_have_account')}}?
                    <a class="font-bold text-black"
                       href="{{route('register.show')}}">{{__('texts.sign_up_for_free')}}</a>
                </p>
            </section>

        </div>
    </x-sessions-layout>
</x-layout>
