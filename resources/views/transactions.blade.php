<x-layout>
    <x-primary-heading>
        <h1>Transaction Overview</h1>
    </x-primary-heading>
    <x-secondary-card class="text-center text-2xl mt-2 mb-4">
        <span class="mr-2">Balance:</span>
        <span class="lg:text-3xl text-main-green">2000,00€</span>
    </x-secondary-card>
    <div class="lg:max-h-[82%] lg:overflow-auto scrollbar">
        <x-transaction-card></x-transaction-card>
        <x-transaction-card></x-transaction-card>
        <x-transaction-card></x-transaction-card>
        <x-transaction-card></x-transaction-card>
        <x-transaction-card></x-transaction-card>
        <x-transaction-card></x-transaction-card>
    </div>
</x-layout>
