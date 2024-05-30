@props(['name', 'class' => ''])

@php
    $defaults= [
        'id' => $name,
        'name' => $name,
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg"
    ]   
@endphp


<label class="hidden" for='{{ $name }}'></label>
<select {{ $attributes($defaults) }} required>
    {{ $slot }}
</select>