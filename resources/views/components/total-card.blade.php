@props(['heading' => 'heading','amount' => 0, 'color' => '', 'class' => ''])

<x-secondary-card class="min-w-52 text-center flex-grow {{ $class }}">
    <x-secondary-heading>
        <h2>{{ $heading }}</h2>
    </x-secondary-heading>
    <div class="text-4xl 2xl:text-5xl mt-1 {{ $color }}">{{ $amount }}€</div>
</x-secondary-card>