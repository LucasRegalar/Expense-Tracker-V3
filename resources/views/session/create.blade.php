<x-layout class="grid items-center justify-center">
    <x-secondary-card class="text-center w-80" style="width: 30rem">
        <div class="m-5">
            <x-primary-heading class="text-xl">
                <h1>Enter your Account Data</h1>
            </x-primary-heading>
            <form class="mt-3 grid gap-3 text-sm" action="/login" method="POST">
                @csrf
                <x-forms.input type='email' name='email' placeholder='example@user.de' value="{{ old('email') }}"/>
                <x-forms.input type="password" name='password' placeholder='password' />
                <x-forms.errors />
                <x-forms.submit-btn class="mx-auto">Log In</x-forms.submit-btn>
            </form>
        </div>
    </x-secondary-card>
</x-layout>
