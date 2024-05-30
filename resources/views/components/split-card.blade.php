@props(['left'=>'left', 'right'=>'right', 'class' => ''])

<x-secondary-card class="flex justify-between {{ $class }}">
    <div>{{ $left }}</div>
    <div>{{ $right }}</div>
</x-secondary-card>