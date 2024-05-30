<x-layout>
    <x-primary-heading>
        <h1>Incomes</h1>
    </x-primary-heading>
    <x-secondary-card class="text-center text-2xl mt-2 mb-4">
        <span class="mr-2">Total Income:</span>
        <span class="lg:text-3xl text-main-green">2000,00€</span>
    </x-secondary-card>
    <div class="grid grid-cols-6 gap-3">
        <div class="col-span-2">
            <form action="" class="flex flex-col gap-3">
                <x-forms.input placeholder="Income Title" name='title' />
                <x-forms.input placeholder="Income Amount" name='amount' />
                <x-forms.input placeholder="Enter a Date" name='date' type='date' />
                <x-forms.select name='category' class="w-[60%] self-end">
                    <option value="" selected hidden>Select primary Category</option>
                    <option value="salary">Salary</option>
                    <option value="freelance">Freelance</option>
                    <option value="investment">Investment</option>
                    <option value="rental-income">Rental Income</option>
                    <option value="goverment-benefits">Goverment Benefits</option>
                    <option value="child-support">Child Support</option>
                </x-forms.select>
                <x-forms.select name='category' class="w-[60%] self-end">
                    <option value="" selected hidden>Select secondary Category</option>
                    <option value="salary">Salary</option>
                    <option value="freelance">Freelance</option>
                    <option value="investment">Investment</option>
                    <option value="rental-income">Rental Income</option>
                    <option value="goverment-benefits">Goverment Benefits</option>
                    <option value="child-support">Child Support</option>
                </x-forms.select>
                <x-forms.textarea name="describtion" placeholder="Add a Referenz"></x-forms.textarea>
                <x-forms.submit-btn>Add Income</x-forms.submit-btn>
            </form>
        </div>
        <div class="col-span-4 lg:max-h-[82%] lg:overflow-auto scrollbar">
            <x-manage-transaction-card></x-manage-transaction-card>
            <x-manage-transaction-card></x-manage-transaction-card>
            <x-manage-transaction-card></x-manage-transaction-card>
            <x-manage-transaction-card></x-manage-transaction-card>
            <x-manage-transaction-card></x-manage-transaction-card>
            <x-manage-transaction-card></x-manage-transaction-card>
        </div>
    </div>
</x-layout>
