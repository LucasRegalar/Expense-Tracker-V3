<x-layout>
    <div class="max-w-[600px] mx-auto lg:max-w-full">
        <div class="flex items-center justify-between">
            <x-primary-heading>
                <h1>Transactions</h1>
            </x-primary-heading>
            <div class="flex gap-2">
                <a href="/transaction/create"
                    class="w-[10rem] h-10 bg-secondary-card rounded-lg border border-border-card transition duration-300 flex items-center justify-center pointer">
                    Add Transaction
                </a>
                <button id="filter-btn"
                    class="w-[10rem] h-10 bg-secondary-card rounded-lg border border-border-card transition duration-300 flex items-center justify-center pointer">
                    <span><img class="h-4 mr-2" src="{{ Vite::asset('resources/imgs/icons/angle-down-solid.svg') }}"
                            alt=""></span>
                    Suchfilter
                </button>
            </div>
        </div>
        <div id="main-content">
            <x-secondary-card class="flex items-center justify-center mt-2 mb-4 group min-h-14">
                <div class="group-hover:hidden">
                    <span class="mr-2 text-2xl">Balance:</span>
                    <span class="lg:text-3xl {{ $totalBalance < 0 ? 'text-main-red' : 'text-main-green'}}">{{ number_format($totalBalance/100, 2)}}€</span>
                </div>
                <div class="hidden group-hover:flex items-center justify-center gap-2">
                    @if (count($activeFilter) === 0)
                        No active Filter
                    @else
                        @foreach ($activeFilter as $filter)
                            <div class="bg-primary-card border border-border-card px-3 py-1 rounded-xl">
                                {{ $filter }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </x-secondary-card>
            <div class=" lg:max-h-[82%] mb-5 lg:mb-0">
                @foreach ($transactions as $transaction)
                    <x-transaction-card :transaction="$transaction" />
                @endforeach
            </div>

            <div>
                {{ $transactions->links('pagination::tailwind') }}
            </div>
        </div>

        @include('transaction.filter-modal')

    </div>

    <script src="{{ Vite::asset('resources/js/pages/transaction.index/toggleFiltermodal.js') }}"></script>
    <script src="{{ Vite::asset('resources/js/pages/transaction.index/filterFilteroptions.js') }}"></script>


</x-layout>
