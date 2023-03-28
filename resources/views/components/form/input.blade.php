@props(['name', 'input', 'placeholder'])

<div class="mb-6">
    <x-form.label name="{{$name}}"/>
    <input class="
           border border-gray-200 p-2 w-full rounded placeholder:text-sm focus:border-blue-700 focus:outline-none"
           name="{{$input}}"
           id="{{$input}}"
           type="{{$input}}"
           placeholder="{{$placeholder}}"
        {{$attributes(['value' => old($input)]) }}>
    <x-form.error name="{{$input}}"/>
</div>
