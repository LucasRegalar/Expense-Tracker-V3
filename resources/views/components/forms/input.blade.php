@props(['type' => 'text', 'name', 'placeholder' => '', 'class' => '', 'value' => '', 'label' => 'false'])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $value,
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none",
    ];
@endphp


<div class="flex gap-2 items-center">
    <label class="{{ $label === 'true' ? '' : 'hidden' }} w-[35%]" for='{{ $name }}'>{{ ucfirst($name) }}</label>
    <input {{ $attributes($defaults) }} required />
</div>
