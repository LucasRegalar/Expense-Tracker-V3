@if ($errors->any())
    <div {{ $attributes->merge(['class' => "text-sm text-main-red my-2", 'id' => 'errors']) }}>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
