<div class="h-20 flex justify-between items-center border-b-2 xl:px-20 pl-3 pr-3">
    <a href="{{route('worldwide.statistics')}}">
        <img
            src="{{asset('/images/Logo.svg')}}"
            alt="not found" />
    </a>
    <div class="float-right flex">
        <x-language-switch/>
        <div class="md:hidden">
            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <img src="{{asset('/images/dropdown.png')}}" alt="not found"/>
                    </button>
                </x-slot>
               <span class="block text-md font-black px-4 py-2">{{auth()->user()->username}}</span>
                <x-dropdown-item>
                    <form method="POST"
                          action="/logout"
                          class="font-medium text-md">
                        @csrf
                        <button type="submit" class="text-red-500">{{__('texts.log_out')}}</button>
                    </form>
                </x-dropdown-item>
            </x-dropdown>
        </div>
        <div class="hidden md:flex">
            <p class="px-7 font-bold text-md">{{auth()->user()->username}}</p>
            <form method="POST"
                  action="/logout"
                  class="font-medium text-md">
                @csrf
                <button type="submit">{{__('texts.log_out')}}</button>
            </form>
        </div>
    </div>
</div>
