@if ($errors->any())
    <div class="text-sm text-main-red my-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
