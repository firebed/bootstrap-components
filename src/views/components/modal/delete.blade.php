<x-bs::modal {{ $attributes }}>
    <x-bs::modal.body>
        <div class="d-grid gap-3 px-4">
            <div class="text-center">
                <em class="far fa-trash-alt fa-5x text-red-400"></em>
            </div>
            <div class="h4 mb-0 fw-normal text-center text-gray-700">{{ $title ?? __('Are you sure?') }}</div>
            <div class="text-gray-600 text-center">{{ $content ?? __('Do you really want to delete these records? This process cannot be undone.') }}</div>
            <div class="py-3 text-center">
                {{ $footer }}
            </div>
        </div>
    </x-bs::modal.body>
</x-bs::modal>