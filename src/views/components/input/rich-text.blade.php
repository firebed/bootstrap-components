@props([
    'menubar' => '',
    'plugins' => '',
    'pasteAsText' => true,
    'toolbar' => 'fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | outdent indent',
    'error'   => null
])

<div
    wire:ignore
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="tinymce.init({
        target: $refs.input,
        plugins: ['{{ $plugins }}'],
        menubar: '{{ $menubar }}',
        toolbar: '{{ $toolbar }}',
        entity_encoding: 'raw',
        paste_as_text: {{ $pasteAsText }},
        relative_urls : false,
        setup: function (editor) {
            //editor.on('input', e => value = editor.getContent())
            editor.on('change', e => value = editor.getContent())
            editor.on('init', e => editor.setContent(value))
            $watch('value', v => !editor.hasFocus() && editor.setContent(v))
        }
    })"
    class="d-grid"
>
    <textarea x-ref="input" {{ $attributes->whereDoesntStartWith('wire:model')->class('form-control opacity-0') }}></textarea>
</div>

@if($error)
    @error($error)
    <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
@endif
