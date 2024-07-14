<x-layout class="">

    <div class="grid items-center justify-center h-full">

        <x-secondary-card class="w-[80vw] max-w-[30rem] text-sm">
            <div class="m-2">
                <x-primary-heading class="text-xl mb-3 text-center">
                    <h1>Edit your transaction details</h1>
                </x-primary-heading>

                <form id="income-form" action="/transaction/{{ $transaction->id }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    @method('patch')
                    <x-forms.input placeholder="Income Title" name='title' value="{{ old('title') }}"
                        label="true" />
                    <x-forms.input placeholder="Income Amount" name='amount' type="number" min="0"
                        max="999999999.99" step="0.01" value="{{ old('amount') }}" label="true" />
                    <x-forms.input name='date' type='date' value="{{ old('date') }}" label='true' />
                    <x-forms.select name="type" required label='true'>
                        <x-forms.option value="income" ofSelect="type" />
                        <x-forms.option value="expense" ofSelect="type" />
                    </x-forms.select>
                    <x-forms.select name='primary_category' class="w-[60%] self-end" required label='true'
                        displayedName='1st Category'>
                        <option value="" selected hidden>Primary Category</option>
                        @foreach ($categories as $category)
                            <x-forms.option :value="$category->title" ofSelect="primary_category" data-type="{{ $category->type }}"/>
                        @endforeach
                    </x-forms.select>
                    <x-forms.select name='secondary_category' class="w-[60%] self-end" required label='true'
                        displayedName='2nd Category'>
                        <option value="" selected hidden>Secondary Category</option>
                        @foreach ($categories as $category)
                            <x-forms.option :value="$category->title" ofSelect="secondary_category" data-type="{{ $category->type }}"/>
                        @endforeach
                    </x-forms.select>
                    <x-forms.textarea name="description" label='true'
                        placeholder="Add a Referenz">{{ old('description') }}</x-forms.textarea>
                    <x-forms.errors />
                    <x-forms.submit-btn--green id='submit-btn' class="mx-auto">Update</x-forms.submit-btn--green>
                </form>


            </div>
        </x-secondary-card>
    </div>

    {{-- Embed PHP data into JS --}}
    <script>
        window.transactionData = {
            flashedPrimaryCategory: '{{ old('primary_category')}}',
            flashedSecondaryCategory: '{{ old('secondary_category')}}',
        }
    </script>

    <script src="{{ Vite::asset('resources/js/pages/transaction.edit.js')}}"></script>

</x-layout>
