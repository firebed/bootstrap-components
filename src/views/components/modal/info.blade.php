<x-bs::modal {{ $attributes }}>
    <x-bs::modal.body>
        <div class="d-grid gap-3 px-4">
            <div class="text-center">
                <em class="fa fa-info-circle fa-5x text-blue-400"></em>
            </div>
            <div class="h4 mb-0 fw-normal text-center text-gray-700">{{ $title }}</div>
            <div class="text-gray-600 text-center">{{ $content }}</div>
            <div class="py-3 text-center">
                <x-bs::button.primary data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.primary>
            </div>
        </div>
    </x-bs::modal.body>
</x-bs::modal>