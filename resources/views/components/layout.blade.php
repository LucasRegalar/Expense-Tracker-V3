<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense-Income-Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-primary-text font-body max-w-[1600px] mx-auto">
    <main>
        <div class="w-full flex">
            <x-nav></x-nav>
            <x-primary-card {{ $attributes->merge(['class' => 'w-full relative']) }}>
                {{ $slot }}
            </x-primary-card>
        </div>
    </main>
</body>

</html>