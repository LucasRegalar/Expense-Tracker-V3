<x-layout>
    <div class="max-w-[600px] mx-auto lg:max-w-full">
    <x-primary-heading class="mb-5">
        <h1>Manage your Standingorders</h1>
    </x-primary-heading>

    <div class="lg:grid grid-cols-6 gap-3 h-full">
        
        <div class="col-span-4 lg:max-h-[82%] lg:overflow-auto scrollbar mb-5 lg:mb-0">
            <x-secondary-card class="mb-3 text-sm">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <img class="h-10 min-w-10" src="{{ Vite::asset("resources/imgs/icons/categories/bitcoin.svg") }}" alt="">
                        <div class="ml-4 flex flex-col gap-3 group">
                            <div class="flex items-center gap-4">
                                <div class="h-3 w-3 bg-main-red rounded-full"></div>
                                <div>Miete</div>
                                <div>300€</div>
                            </div>
            
                            <div class="flex gap-5 min-[475px]:group-hover:hidden">
                                <div class="flex items-center gap-1">
                                    <img class="h-4 w-4" src="{{ Vite::asset('resources/imgs/icons/calendar-regular.svg') }}"
                                        alt="calender">
                                    01.01.2024 until 30.06.2024
                                </div>
                                <div class="min-[475px]:flex items-center gap-1 hidden">
                                    <img class="h-4 w-4" src="{{ Vite::asset('resources/imgs/icons/comment-regular.svg') }}"
                                        alt="comment">
                                    <div>This is my standingorder.</div>
                                </div>
                            </div>
                            <div class="hidden min-[475px]:group-hover:block">
                                <ul class="text-sm flex">
                                    <h3 class="mr-2">Categories:</h3>
                                    <div class="flex">
                                        {{-- @foreach ($income->categories as $category)
                                            <li class="first:text-main-green">{{ ucwords($category->title) }}</li>
                                            <span class="last:hidden mr-2">{{ ',' }}</span>
                                        @endforeach --}}
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form {{-- action="/standingorder/{{ $standingorder->id }}" --}} method="POST">
                        @csrf
                        @method('delete')
                        <button class="cursor-pointer">
                            <img class="h-5 w-5" src="{{ Vite::asset('resources/imgs/icons/trash-can-regular.svg') }}"
                                        alt="trash can">
                        </button>
                    </form>
                </div>
            </x-secondary-card>
        </div>

        <div class="col-span-2 row-start-1 text-sm">
            <form action="/standingorder" method="POST" class="flex flex-col gap-3">
                @csrf
                <x-forms.input placeholder="Income Title" name='title' value="{{ old('title') }}"/>
                <x-forms.input placeholder="Amount" name='amount' type="number" min="0" max="999999999.99" step="0.01" value="{{ old('amount') }}"/>
                <label class="pl-3" for="date">Enter a Startingate</label>
                <input class="w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none" name='startingdate' type='date' value="{{ old('startingdate') }}" />
                <label class="pl-3" for="date">Enter an Enddate (optional)</label>
                <input class="w-full bg-primary-card border border-border-card py-2 px-4 rounded-lg focus:outline-none" name='enddate' type='date' value="{{ old('enddate') }}" />
                <x-forms.select name='primary-category' class="w-[60%] self-end">
                    <option value="" selected hidden>Select Primary Category</option>
                    @foreach ($categories as $category)
                        <x-forms.option :value="$category->title" ofSelect="primary-category"/>
                    @endforeach
                </x-forms.select>
                <x-forms.select name='secondary-category' class="w-[60%] self-end">
                    <option value="" selected hidden>Select Secondary Category</option>
                    @foreach ($categories as $category)
                        <x-forms.option :value="$category->title" ofSelect="secondary-category"/>
                    @endforeach
                </x-forms.select>
                <x-forms.textarea name="description" placeholder="Add a Referenz">{{ old('description') }}</x-forms.textarea>
                <x-forms.errors />
                <div class="flex gap-3">
                    <x-forms.select class="w-[50%]" name='type'>
                        <x-forms.option value="Income" ofSelect="type"/>
                        <x-forms.option value="Expense" ofSelect="type"/>
                    </x-forms.select>
                    <x-forms.submit-btn--red class="mx-auto lg:mx-0">Add Income</x-forms.submit-btn--red>
                </div>
            </form>
        </div>
    </div>
    </div>
</x-layout>