<x-verified-layout url="{{route('home')}}">
    <p class="mt-5 text-indigo-500"> {{__('texts.your_password_has_been_updated')}}!</p>
    <p class="text-md font-medium pt-5 text-indigo-500">{{__('texts.you_will_be_redirected')}}!</p>
    <p class="mt-10 text-md font-bold">{{__('texts.or')}}</p>
    <section class="mt-10">
        <a href="{{route('home')}}">
            <x-form.button>{{__('texts.log_in')}}</x-form.button>
        </a>
    </section>

</x-verified-layout>

