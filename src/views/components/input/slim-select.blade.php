@props([
    'error' => NULL,
    'allowDeselect' => false,
])

<div wire:ignore
     x-data
     x-init="new SlimSelect({
        select: $refs.select,
        showSearch: false,
        allowDeselect: {{ $allowDeselect ? 'true' : 'false' }},
     })"
>
    <select hidden x-ref="select" {{ $attributes }}>
        {{ $slot }}
    </select>
</div>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
