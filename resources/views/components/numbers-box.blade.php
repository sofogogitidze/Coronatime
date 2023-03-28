@props(['url', 'text', 'color'])
<div {{$attributes->class(["bg-contain 2xl:bg-contain 2xl:h-[380px] md:h-[130px] w-full lg:h-[240px] h-[240px] bg-no-repeat text-center flex flex-col justify-center"])}}>
    <img src="{{$url}}"
         alt="not found"
         class="mx-auto md:w-[40px] md:h-[30px] lg:w-[80px]"
        />
    <p class="pt-5 text-sm md:text-xs xl:text-base font-semibold">{{$text}}</p>
    {{$slot}}
</div>

