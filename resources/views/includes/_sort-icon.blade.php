@if($sortField !== $field)
    <div class="pl-2">
        <img class="pb-0.5" src="{{asset('/images/sort_up.png')}}" alt="not found">
        <img src="{{asset('/images/sort_down.png')}}" alt="not found">
    </div>
    @elseif($sortAsc)
    <div class="pl-1 align-items-center">
        <img class="pb-0.5" src="{{asset('/images/sort_up.png')}}" alt="not found">
    </div>
    @else
    <div class="pl-1 align-items-center">
        <img src="{{asset('/images/sort_down.png')}}" alt="not found">
    </div>
@endif
