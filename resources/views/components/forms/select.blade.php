@props(['name', 'class' => '', 'required' => false, 'label' => 'false', 'displayedName' => ''])

@php
    $defaults= [
        'id' => "$name" . "-select",
        'name' => $name,
        'class' => "$class w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg"
    ]   
@endphp


<div class="flex gap-2 items-center">
    <label class="{{ $label === 'true' ? '' : 'hidden' }} w-[35%]" for='{{ $defaults['id'] }}'>{{ $displayedName ? $displayedName : ucfirst($name) }}</label>
<select {{ $attributes($defaults) }} {{ $required ? 'required' : ' '}} >
    {{ $slot }}
</select>
</div>