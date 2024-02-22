<label class="mb-2 block text-sm font-medium text-slate-500"
for=" {{ $for }}">
    {{ $slot }}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>