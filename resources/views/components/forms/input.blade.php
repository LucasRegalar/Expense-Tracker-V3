@props(['type' => 'text', 'name', 'placeholder' => '', 'class' => '', 'value' => ''])

@php
    $defaults= [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => $value,
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none"
    ]   
@endphp


<label class="hidden" for='{{ $name }}'>{{ $name }}</label>
<input {{ $attributes($defaults) }} required />

