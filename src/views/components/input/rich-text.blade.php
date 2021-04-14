@props([
    'menubar' => '',
    'plugins' => '',
    'toolbar' => 'fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | outdent indent',
    'error'   => null
])

<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="tinymce.init({
        target: $refs.input,
        plugins: ['{{ collect($plugins }}'],
        menubar: '{{ $menubar }}',
        toolbar: '{{ $toolbar }}',
        setup: function (editor) {
            //editor.on('input', e => value = editor.getContent())
            editor.on('change', e => value = editor.getContent())
            editor.on('init', e => editor.setContent(value))
            $watch('value', v => !editor.hasFocus() && editor.setContent(v))
        }
    });"
    wire:ignore
>
    <textarea x-ref="input" {{ $attributes->whereDoesntStartWith('wire:model')->class('form-control opacity-0') }}></textarea>
</div>

@if($error)
    @error($error)
    <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
@endif
