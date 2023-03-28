@props(['header'])
<x-navbar/>
<div class="xl:px-20 mt-14 px-3">
    <p class="text-2xl font-extrabold">{{$header}}</p>
    <section class="flex mt-5 pb-2 text-base font-normal border-b-2">
        <div href="{{route('worldwide.statistics')}}" class="{{Request::routeIs('worldwide.statistics') ? 'text-indigo-600' : ''}}">
            <span class="pb-2 border-black {{Request::routeIs('worldwide.statistics') ? ' border-b-4' : ''}}">
                <a href="{{route('worldwide.statistics')}}">
                {{__('texts.worldwide')}}
            </a>
            </span>
        </div>
        <div href="{{route('country.statistics')}}" class="{{Request::routeIs('country.statistics') ? 'text-indigo-600' : ''}}">
            <a href="{{route('country.statistics')}}" class="ml-20">
            <span class="pb-2 border-black {{Request::routeIs('country.statistics') ? ' border-b-4' : ''}}">{{__('texts.by_country')}}</span>
            </a>
        </div>
        </section>
    {{$slot}}
</div>
