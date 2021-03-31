@props([
'size' => null,
'backdrop' => 'true'
])

<div
        wire:ignore.self
        x-data="{ show: @entangle($attributes->wire('model')) }"
        x-init="
        new bootstrap.Modal($el, {backdrop: '{{ $backdrop }}'});
        $watch('show', value => value ? bootstrap.Modal.getInstance($el).show() : bootstrap.Modal.getInstance($el).hide());
        $el.addEventListener('hidden.bs.modal', () => show = false);
    "
        id="{{ $id ?? md5($attributes->wire('model')) }}"
        class="modal fade"
        tabindex="-1" xmlns:wire="http://www.w3.org/1999/xhtml">

    <div class="modal-dialog shadow @isset($size) modal-{{ $size }} @endisset">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
