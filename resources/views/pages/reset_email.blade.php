<x-layout>
    <x-reset-layout ref="{{route('home')}}">
        <p class="text-2xl font-black text-center">{{__('texts.reset_password')}}</p>
        <section class="mt-10 w-full items-center">

            <form method="" action="" class="lg:w-[400px]">
                @csrf
                <x-form.input name="{{__('texts.new_password')}}"
                              input="email"
                              placeholder="{{__('texts.enter_new_password')}}"/>
                <x-form.input name="{{__('texts.repeat_password')}}"
                              input="email"
                              placeholder="{{__('texts.repeat_password')}}"/>
                <x-form.button>{{__('texts.save_changes')}}</x-form.button>
            </form>

        </section>
    </x-reset-layout>
</x-layout>
