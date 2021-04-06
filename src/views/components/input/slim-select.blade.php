@props([
    'error' => NULL,
    'allowDeselect' => false,
])

<div wire:ignore
     x-data="{ values: @entangle($attributes->wire('model')) }"
     x-init="new SlimSelect({
        select: $refs.select,
        showSearch: false,
        allowDeselect: {{ $allowDeselect ? 'true' : 'false' }},
        onChange: () => {
            const selected = $refs.select.slim.selected()
            for(let i=0; i<selected.length; i++) {
                if (selected[i] !== values[i]) {
                    values = $refs.select.slim.selected()
                    break
                }
            }
        }
     })
     $refs.select.slim.set(values)
    "
>
    <select hidden x-ref="select" {{ $attributes->whereDoesntStartWith('wire:model') }}>
        {{ $slot }}
    </select>
</div>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
