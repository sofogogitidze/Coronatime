<div class="flex flex-col xl:grid xl:grid-cols-5 xl:pl-20 pl-3">
    <div class="col-span-3 mt-10">
        <div class="flex xl:w-3/5 justify-between">
            <section class="flex justify-between w-full items-center xl:w-4/5">
            <a href="{{route('home')}}">
                <img
                    src="{{url('/images/Logo.svg')}}"/>
            </a>
                <x-language-switch/>
            </section>
        </div>
        <section class="xl:w-3/5 ">
            {{$slot}}
        </section>
    </div>
    <section class="col-span-2">
        <img
            class="h-screen xl:block hidden" width="100%"
            src="{{url('/images/Vaccine.jpg')}}"
            alt="Not Found"/>
    </section>
</div>
