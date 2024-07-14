<x-layout>
    <div class="max-w-[600px] mx-auto lg:max-w-full">
        <x-primary-heading>
            <h1>Dashboard</h1>
        </x-primary-heading>
        <div class="lg:grid lg:grid-cols-5 gap-3 mt-2">
            <div class="lg:col-span-3">
                <x-secondary-card class="h-64">This is gonna be my graph</x-secondary-card>
                <section class="flex gap-3 flex-wrap justify-center mt-5">
                    <x-total-card heading="Total Income" amount="3000,00" />
                    <x-total-card heading="Total Expense" amount="980,00" />
                    <x-total-card heading="Total Balance" amount="2020,00" color="text-main-green" />
                </section>
            </div>
            <div class="lg:col-span-2">
                <section class="mt-5">
                    <x-secondary-heading>
                        <h2>Recent History</h2>
                    </x-secondary-heading>
                        <div class="flex flex-col gap-3 mt-2">
                            <x-split-card left="Hoodie" right="-80.00€" class="text-main-red" />
                            <x-split-card left="Jabob's Website" right="+1000.00€" class="text-main-green" />
                            <x-split-card left="MacBook" right="-900.00€" class="text-main-red" />
                        </div>
                </section>
                <section class="mt-5">
                    <x-secondary-heading class="flex justify-between mb-2">
                        <div class="text-base">Min</div>
                        <h2>Salary</h2>
                        <div class="text-base">Max</div>
                    </x-secondary-heading>
                    <x-split-card left="1000,00€" right="2000,00€" class="mb-5"/>
                    <x-secondary-heading class="flex justify-between mb-2">
                        <div class="text-base">Min</div>
                        <h2>Expense</h2>
                        <div class="text-base">Max</div>
                    </x-secondary-heading>
                    <x-split-card left="80,00€" right="900,00€" />
                </section>
            </div>
        </div>
    </div>
</x-layout>
