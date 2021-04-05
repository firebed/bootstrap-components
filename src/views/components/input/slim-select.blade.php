@props([
    'allowDeselect' => false,
])

<div wire:ignore
     x-data
     x-init="new SlimSelect({
        select: $refs.select,
        showSearch: false,
        addToBody: true,
        onChange: () => {
            $dispatch('change', select.selected());
        }
     })"
>
    <select hidden x-ref="select" {{ $attributes }}>
        @if($allowDeselect)
            <option data-placeholder="true"></option>
        @endif
        {{ $slot }}
    </select>
</div>