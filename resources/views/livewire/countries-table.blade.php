<div class="max-h-[600px] overflow-auto overflow-y-auto relative shadow-md sm:rounded-lg mt-2 md:mt-10 ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-4">
                <div class="flex items-center">
                    {{__('texts.location')}}
                    <a wire:click.prevent="sortBy('code')" role="button" href="#">
                        @include('includes._sort-icon', ['field' => 'code'])
                    </a>
                </div>
            </th>
            <th scope="col" class="py-3 px-4">
                <div class="flex items-center">
                    {{__('texts.new_cases')}}

                    <a wire:click.prevent="sortBy('confirmed')" role="button" href="">
                        @include('includes._sort-icon', ['field' => 'confirmed'])
                    </a>
                </div>
            </th>
            <th scope="col" class="py-3 px-3">
                <div class="flex items-center">
                    {{__('texts.recovered')}}
                    <a wire:click.prevent="sortBy('recovered')" role="button" href="#">
                        @include('includes._sort-icon', ['field' => 'recovered'])
                    </a>
                </div>
            </th>
            <th scope="col" class="py-3 px-3">
                <div class="flex items-center">
                    {{__('texts.critical')}}
                    <a wire:click.prevent="sortBy('critical')" role="button" href="#">
                        @include('includes._sort-icon', ['field' => 'critical'])
                    </a>
                </div>
            </th>
            <th scope="col" class="py-3 px-3">
                <div class="flex items-center">
                    {{__('texts.deaths')}}
                    <a wire:click.prevent="sortBy('deaths')" role="button" href="#">
                        @include('includes._sort-icon', ['field' => 'deaths'])
                    </a>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            @if (request('search') == '' && count($country_statistics) != 0)
                <th scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{__('texts.worldwide')}}
                </th>
                <td class="py-4 px-4">
                    {{DB::table('country_statistics')->sum('confirmed')}}
                </td>
                <td class="py-4 px-4">
                    {{DB::table('country_statistics')->sum('recovered')}}
                </td>
                <td class="py-4 px-4">
                    {{DB::table('country_statistics')->sum('critical')}}
                </td>
                <td class="py-4 px-4">
                    {{DB::table('country_statistics')->sum('deaths')}}
                </td>
            @endif
        </tr>
        @foreach($country_statistics as $country)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$country->name}}
                </th>
                <td class="py-4 px-4">
                    {{$country->confirmed}}
                </td>
                <td class="py-4 px-4">
                    {{$country->recovered}}
                </td>
                <td class="py-4 px-4">
                    {{$country->critical}}
                </td>
                <td class="py-4 px-4">
                    {{$country->deaths}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @if(count($country_statistics) == 0)
        <p class="text-center mt-5 mb-5 text-red-500">{{__('texts.no_results_found')}}</p>
    @endif
</div>
