<x-layout>
<x-reset-layout ref="{{route('home')}}">
    <div class="mr-3">
        <p class="text-2xl font-black text-center">{{__('texts.reset_password')}}</p>
        <section class="mt-10 w-full items-center">

            <form method="POST" action="{{route('password.email')}}" class="lg:w-[400px]">
                @csrf
                <x-form.input name="{{__('texts.email')}}"
                              input="email"
                              placeholder="{{__('texts.enter_email')}}"/>
                <x-form.button>{{__('texts.send_reset_link')}}</x-form.button>
            </form>

        </section>
    </div>
</x-reset-layout>
</x-layout>
