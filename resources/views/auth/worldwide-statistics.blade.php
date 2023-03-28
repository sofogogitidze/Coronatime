<x-layout>
    <x-statistics-layout header="{{__('texts.worldwide_statistics')}}">
        <div class="grid md:grid-cols-4 mt-10 gap-3">
            <x-numbers-box
                class="bg-new-cases"
                url="{{asset('/images/new_cases_vector.png')}}"
                text="{{__('texts.new_cases')}}">
                <p class="pt-5 font-black md:text-xs lg:text-4xl text-custom-blue">{{$confirmed}}</p>
            </x-numbers-box>
            <x-numbers-box
                class="bg-recovered"
                url="{{asset('/images/recovered_vector.svg')}}"
                text="{{__('texts.recovered')}}">
                <p class="pt-5 font-black md:text-xs lg:text-4xl text-custom-green">{{$recovered}}</p>
            </x-numbers-box>
            <x-numbers-box
                class="bg-death"
                url="{{asset('/images/death_vector.svg')}}"
                text="{{__('texts.death')}}">
                <p class="pt-5 font-black md:text-xs lg:text-4xl text-custom-yellow">{{$deaths}}</p>
            </x-numbers-box>
            <x-numbers-box
                class="bg-death"
                url="{{asset('/images/death_vector.svg')}}"
                text="{{__('texts.critical')}}"
                color="red">
                <p class="pt-5 font-black md:text-xs lg:text-4xl text-custom-red">{{$critical}}</p>
            </x-numbers-box>
        </div>
    </x-statistics-layout>
</x-layout>
