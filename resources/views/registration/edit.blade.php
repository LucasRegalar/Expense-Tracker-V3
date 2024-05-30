<x-layout class="grid items-center justify-center">
    <x-secondary-card class="text-center w-80" style="width: 30rem">
        <div class="m-5">
            <x-primary-heading class="text-xl">
                <h1>Manage your Account</h1>
            </x-primary-heading>
            <form class="mt-3 grid gap-3 text-sm" action="">
                <div class="flex gap-3">
                    <label class="text-left ml-3" for="premium">Premium?</label>
                    <input type="checkbox" name='premium' id='premium' />
                </div>

                <x-forms.divider />

                <label class="text-left ml-3" for="picture">Choose your profilpicture</label>
                <input type="file" id="picture" name="picture" placeholder=""
                    class="w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none"
                    required="">
                <x-forms.submit-btn class="mx-auto">Safe changes</x-forms.submit-btn>
            </form>
        </div>
    </x-secondary-card>
</x-layout>