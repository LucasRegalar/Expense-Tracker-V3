@props(['name', 'placeholder' => '', 'class' => ''])

@php
    $defaults= [
        'id' => $name,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => old($name),
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none resize-none"
    ]   
@endphp


<label class="hidden" for='{{ $name }}'></label>
<textarea {{ $attributes($defaults) }} required minlength="1" maxlength="30" rows="4"></textarea>