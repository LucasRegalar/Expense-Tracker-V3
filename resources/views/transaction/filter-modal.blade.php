<div id="modal" class="hidden">
    <x-secondary-card class="mt-2 mb-4">
        <div class="w-[80vw] max-w-[30rem] mx-auto">
            <h2 class="text-2xl text-center mb-4">Choose your filter</h2>
            <form id="filter-form" action="/transactions" method="GET" class="flex flex-col gap-3">
                @csrf
                <x-forms.select name='type' class="w-[60%] self-end">
                    <option value="" selected>Incomes and Expenses</option>
                    <x-forms.option value="income" ofSelect="type" />
                    <x-forms.option value="expense" ofSelect="type" />
                </x-forms.select>
                <x-forms.divider />
                <div>
                    <x-forms.select name='category' class="w-[60%] self-end mb-3">
                        <option value="" selected>All Categories</option>
                        @foreach ($categories as $category)
                            <x-forms.option :value="$category->title" ofSelect="category"
                                data-type="{{ $category->type }}" />
                        @endforeach
                    </x-forms.select>
                    <div class="text-xs ml-2">
                        <input type="checkbox" name="only-primary-category" id="only-primary-category">
                        <label for="only-primary-category">Only Primary Category</label>
                    </div>
                </div>
                <x-forms.divider />
                <label class="pl-3" for="starting-date">Starting Date</label>
                <input
                    class="w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none"
                    name='starting-date' id="starting-date" type='date' value="{{ old('starting-date') }}" />
                <label class="pl-3" for="end-date">End Date</label>

                <input
                    class="w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none"
                    name='end-date' id="end-date" type='date' value="{{ old('end-date') }}" />
                <x-forms.errors />
                <x-forms.submit-btn--red class="mx-auto">Apply</x-forms.submit-btn--red>
            </form>
        </div>
    </x-secondary-card>
</div>