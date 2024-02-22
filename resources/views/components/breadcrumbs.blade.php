<nav {{ $attributes }}>
    <ul class="flex space-x-2 text-slate-500 font-semibold">
        <li class="hover:text-slate-700">
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li>→</li>
            <li class="hover:text-slate-700">
                <a href="{{ $link }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>