<a class="flex items-center gap-4 fill-primary-text hover:fill-white hover:translate-x-4 transition-[transform] duration-500 cursor-pointer" {{ $attributes }}>
    <div class="h-5 w-5">
        {{ $svg }}
    </div>
    <li>
        {{ $slot }}
    </li>
</a>