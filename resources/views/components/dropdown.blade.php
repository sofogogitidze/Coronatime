@props(['trigger'])

<div x-data="{show: false}" @click.away="show = false" class="relative">
    <div @click="show = ! show">
        {{$trigger}}
    </div>

    <div x-show="show" class="absolute right-0 mt-2 py-2 w-48 bg-gray-200 align-items-center rounded-xl shadow-xl"
         style="display: none">
        {{$slot}}
    </div>
</div>
