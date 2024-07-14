<x-layout class="">

    <div class="grid items-center justify-center h-full">

        <x-secondary-card class="w-[80vw] max-w-[30rem] text-sm">
            <div class="m-2">
                <x-primary-heading class="text-xl mb-3 text-center">
                    <h1>Enter your transaction details</h1>
                </x-primary-heading>
                
                <form id="income-form" action="/transaction" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <x-forms.input placeholder="Income Title" name='title' value="{{ old('title') }}" label="true"/>
                    <x-forms.input class="hidden" name='type' value='income' />
                    <x-forms.input placeholder="Income Amount" name='amount' type="number" min="0"
                        max="999999999.99" step="0.01" value="{{ old('amount') }}" label="true"/>
                    <x-forms.input name='date' type='date' value="{{ old('date') }}" label='true' />
                    <x-forms.select name='primary_category' class="w-[60%] self-end" required label='true'
                    displayedName='1st Category'>
                        <option value="" selected hidden>Select Primary Category</option>
                        @foreach ($categories->where('type', 'income') as $category)
                            <x-forms.option :value="$category->title" ofSelect="primary_category" />
                        @endforeach
                    </x-forms.select>
                    <x-forms.select name='secondary_category' class="w-[60%] self-end" required label='true'
                    displayedName='2nd Category'>
                        <option value="" selected hidden>Select Secondary Category</option>
                        @foreach ($categories->where('type', 'income') as $category)
                            <x-forms.option :value="$category->title" ofSelect="secondary_category" />
                        @endforeach
                    </x-forms.select>
                    <x-forms.textarea name="description" label="true"
                        placeholder="Add a Referenz">{{ old('description') }}</x-forms.textarea>
                    <x-forms.errors />
                    <x-forms.submit-btn--green class="mx-auto">Add Income</x-forms.submit-btn--green>
                </form>

                <form id="expense-form" action="/transaction" method="POST" class="flex flex-col gap-2 hidden">
                    @csrf
                    <x-forms.input placeholder="Expense Title" name='title' value="{{ old('title') }}" label="true"/>
                    <x-forms.input class="hidden" name='type' value='expense' />
                    <x-forms.input placeholder="Expense Amount" name='amount' type="number" min="0"
                        max="999999999.99" step="0.01" value="{{ old('amount') }}" label="true"/>
                    <x-forms.input name='date' type='date' value="{{ old('date') }}" label='true' />
                    <x-forms.select name='primary_category' class="w-[60%] self-end" required label='true'
                    displayedName='1st Category'>
                        <option value="" selected hidden>Select Primary Category</option>
                        @foreach ($categories->where('type', 'expense') as $category)
                            <x-forms.option :value="$category->title" ofSelect="primary_category" />
                        @endforeach
                    </x-forms.select>
                    <x-forms.select name='secondary_category' class="w-[60%] self-end" required label='true'
                    displayedName='2nd Category'>
                        <option value="" selected hidden>Select Secondary Category</option>
                        @foreach ($categories->where('type', 'expense') as $category)
                            <x-forms.option :value="$category->title" ofSelect="secondary_category" />
                        @endforeach
                    </x-forms.select>
                    <x-forms.textarea name="description" label="true"
                        placeholder="Add a Referenz">{{ old('description') }}</x-forms.textarea>
                    <x-forms.errors />
                    <x-forms.submit-btn--red class="mx-auto">Add Expense</x-forms.submit-btn--red>
                </form>

                {{-- TODO: Kann ich die Dopllung von den Forms so lassen? --}}

            </div>
        </x-secondary-card>
    </div>


    <label class="absolute cursor-pointer bottom-9">
        <input type="checkbox" value="" class="sr-only peer">
        <div
            class="relative w-11 h-6 bg-main-green peer-focus:outline-none rounded-full peer dark:bg-main-green peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-main-red peer-checked:bg-main-red">
        </div>
    </label>

    <script src="{{ Vite::asset('resources/js/pages/transaction.create.js') }}"></script>

</x-layout>



{{-- TODO: Not overflowing with Error message + toggle switch not moving with error message --}}