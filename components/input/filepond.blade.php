<div
        wire:ignore
        x-data
        x-init="
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
        );
        FilePond.setOptions({
            labelTapToCancel: '{{ __("Tap to cancel") }}',
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
                }
            },
        });
        pond = FilePond.create($refs.input);
    "
        xmlns:wire="http://www.w3.org/1999/xhtml">
    <input type="file" x-ref="input" class="filepond">
</div>
