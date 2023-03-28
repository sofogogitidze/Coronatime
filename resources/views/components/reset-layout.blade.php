<div class="flex flex-col xl:pr-20 mt-5 items-center pl-3">
        <img src="{{url('/images/Logo.svg')}}"
             alt="not found"
            class="items-center"/>
    <section class="mt-3">
        <x-language-switch/>
    </section>
    <div class="mt-32 w-full xl:w-[400px] md:w-[400px] items-center">
        {{$slot}}
    </div>
</div>
