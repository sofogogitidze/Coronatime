@props(['url'])
<script>
    setTimeout(function(){window.location='{{$url}}'}, 3000)
</script>

<x-layout>
    <x-reset-layout ref="{{route('email.verified')}}">
        <div class="text-center items-center flex flex-col mt-5">
            <img src="{{url('images/checked.png')}}"
                 alt="not found"/>
       <section>
           {{$slot}}
       </section>
        </div>
    </x-reset-layout>
</x-layout>
