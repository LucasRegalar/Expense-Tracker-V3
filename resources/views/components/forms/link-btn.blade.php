@props(['class' => '', 'href' => ''])

@php
    $defaults= [
        'class' => "$class w-[10rem] h-10 bg-secondary-card rounded-3xl border border-border-card hover:bg-[#c02e69] transition duration-300 flex items-center justify-center pointer",
        'href' => $href,
    ];
@endphp

<a {{ $attributes($defaults) }}>{{ $slot }}</a>