@props(['name', 'placeholder' => '', 'class' => '', 'label' => 'false'])

@php
    $defaults= [
        'id' => $name,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => old($name),
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none resize-none"
    ]   
@endphp


<label class="{{ $label === 'true' ? '' : 'hidden' }}" for='{{ $name }}'>{{ ucfirst($name)}}</label>
<textarea {{ $attributes($defaults) }} required minlength="1" maxlength="30" rows="2">{{ $slot }}</textarea>