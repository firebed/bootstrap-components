@props([
    'toolbar' => 'fontsizeselect | bold italic underline | forecolor | alignleft aligncenter alignright alignjustify | outdent indent'
])

<div
        x-data="{ value: @entangle($attributes->wire('model')) }"
        x-init="
            tinymce.init({
                target: $refs.input,
                menubar: '',
                toolbar: '{{ $toolbar }}',
                setup: function (editor) {
                    editor.on('input', function (e) {
                        value = editor.getContent();
                    });
                }
            });
            $watch('value', v => console.log(v));
        "
        wire:ignore
>
        <textarea x-ref="input" {{ $attributes->whereDoesntStartWith('wire:model')->class('form-control opacity-0') }}></textarea>
</div>

@error($attributes->wire('model')->value)
<div class="text-danger small mt-1">{{ $message }}</div>
@enderror
