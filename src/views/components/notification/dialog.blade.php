@props([
    'event' => 'dialog-notification'
])

<x-bs::modal
    x-data="{ show: false, message: {} }"
    x-init="
        new bootstrap.Modal($el);
        $watch('show', value => value ? bootstrap.Modal.getInstance($el).show() : bootstrap.Modal.getInstance($el).hide());
        $el.addEventListener('hidden.bs.modal', () => show = false);
        window.addEventListener('{{ $event }}', notification => { message = notification.detail; show = true; });
    "
>
    <x-bs::modal.body>
        <div class="d-grid gap-3 px-4">
            <div class="text-center text-green-500" x-show="message.type === 'success'">
                <x-bs::icons.check-circle width="80" height="80"/>
            </div>
            <div class="text-center text-blue-500" x-show="message.type === 'info'">
                <x-bs::icons.info-circle width="80" height="80"/>
            </div>
            <div class="text-center text-yellow-500" x-show="message.type === 'warning'">
                <x-bs::icons.exclamation-circle width="80" height="80"/>
            </div>
            <div class="text-center text-red-500" x-show="message.type === 'error'">
                <x-bs::icons.x-circle width="80" height="80"/>
            </div>
            <div x-text="message.title" class="fs-4 text-center text-secondary"></div>
            <div x-html="message.content" class="text-gray-600 text-center"></div>
            <div class="d-flex justify-content-center">
                <x-bs::button.success x-show="message.type === 'success'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.success>
                <x-bs::button.primary x-show="message.type === 'info'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.primary>
                <x-bs::button.warning x-show="message.type === 'warning'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.warning>
                <x-bs::button.danger x-show="message.type === 'error'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.danger>
            </div>
        </div>
    </x-bs::modal.body>
</x-bs::modal>
