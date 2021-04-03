<x-bs::modal {{ $attributes }}>
    <x-bs::modal.body>
        <div class="d-grid gap-3 px-4">
            @isset($icon)
                <div class="text-center">
                    {{ $icon }}
                </div>
            @endisset
            <div class="h4 mb-0 fw-normal text-center text-gray-700">{{ $title }}</div>
            <div class="text-gray-600 text-center">{{ $content }}</div>
            <div class="py-3 text-center">{{ $actions }}</div>
        </div>
    </x-bs::modal.body>
</x-bs::modal>