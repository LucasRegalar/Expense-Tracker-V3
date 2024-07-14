@props(['transaction'])

<x-secondary-card class="mb-3 text-sm">
    <div class="flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img class="h-10 min-w-10" src="{{ Vite::asset($transaction->categories[0]->image->path) }}" alt="">
            <div class="ml-4 flex flex-col gap-3 group">
                <div class="flex items-center">
                    <div class="h-3 w-3 mr-4 {{ $transaction->type === 'income' ? 'bg-main-green' : 'bg-main-red' }} rounded-full"></div>
                    <div>{{ ucwords($transaction->title) }}</div>
                </div>

                <div class="flex gap-5 min-[475px]:group-hover:hidden">
                    <div>{{ number_format($transaction->amount/100, 2) . ' €' }}</div>
                    <div class="flex items-center gap-1">
                        <img class="h-4 w-4" src="{{ Vite::asset('resources/imgs/icons/calendar-regular.svg') }}"
                            alt="calender">
                        {{ $transaction->date }}
                    </div>
                    <div class="min-[475px]:flex items-center gap-1 hidden">
                        <img class="h-4 w-4" src="{{ Vite::asset('resources/imgs/icons/comment-regular.svg') }}"
                            alt="comment">
                        <div>{{ ucfirst($transaction->description) }}</div>
                    </div>
                </div>
                <div class="hidden min-[475px]:group-hover:block">
                    <ul class="text-sm flex">
                        <h3 class="mr-2">Categories:</h3>
                        <div class="flex">
                            @foreach ($transaction->categories as $category)
                                <li class="first:text-main-green">{{ ucwords($category->title) }}</li>
                                <span class="last:hidden mr-2">{{ ',' }}</span>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex gap-4">
            <a href="/transaction/{{ $transaction->id }}/edit">
                <img class="h-5 w-5" src="{{ Vite::asset('resources/imgs/icons/pen-to-square-solid.svg') }}"
                                alt="trash can">
            </a>
            <form action="/transaction/{{ $transaction->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="cursor-pointer">
                    <img class="h-5 w-5" src="{{ Vite::asset('resources/imgs/icons/trash-can-regular.svg') }}"
                                alt="trash can">
                </button>
            </form>
        </div>
    </div>
</x-secondary-card>
