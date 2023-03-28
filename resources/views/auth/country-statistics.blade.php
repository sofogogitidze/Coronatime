<x-layout>
    <x-statistics-layout header="{{__('texts.statistics_by_country')}}">
        <div class="mt-2 md:mt-10">
            <section class="flex md:border h-[45px] md:w-[270px] p-1 rounded-lg md:border-2">
                <form method="GET" action="" class="flex">
                    <button type="submit">
                        <img
                            src="{{url('/images/search.png')}}"
                            alt="not found"
                            class="md:ml-2"/>
                    </button>
                    <input class="w-[200px] ml-3 placeholder:font-medium focus:outline-none"
                           type="text"
                           name="search"
                           placeholder="{{__('texts.search_by_country')}}"
                           value="{{ request('search') }}">
                </form>
            </section>
            <x-table/>
        </div>
    </x-statistics-layout>
</x-layout>
