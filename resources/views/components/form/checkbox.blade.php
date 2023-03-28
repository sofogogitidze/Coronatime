@props(['name', 'input'])

<div class="flex justify-between mb-3">
        <section>
            <input name="remember" type="checkbox" value="1" />
            <label for="remember" class="pl-2">{{__('texts.remember_device')}}</label>
        </section>
    <x-form.error name="error"/>
</div>
