@php
    $classes = 'block px-4 py-2 bg-gray-200 text-gray-800 hover:bg-gray-300 focus:bg-gray-300 hover:text-white';
@endphp

<a
    {{$attributes(['class'=> $classes])}}>
    {{$slot}}
</a>
