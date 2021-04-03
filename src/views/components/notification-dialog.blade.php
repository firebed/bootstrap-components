{{--
-- Important note:
--
-- This notification dialog should only be used once on a page.
-- Make sure to add x-on:{custom-event}='message = $event.detail; show = true;'
-- when invoking this component.
--
--}}

@props([
    'event' => 'notify'
])

<x-bs::modal
    x-data="{ show: false, message: {} }"
    x-init="
        new bootstrap.Modal($el);
        $watch('show', value => value ? bootstrap.Modal.getInstance($el).show() : bootstrap.Modal.getInstance($el).hide());
        $el.addEventListener('hidden.bs.modal', () => show = false);
    "
    x-on:{{ $event }}.window="message = $event.detail; show = true"
>
    <x-bs::modal.body>
        <div class="d-grid gap-3 px-4">
            <div class="text-center text-green-500" x-show="message.type === 'success'">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                </svg>
            </div>
            <div class="text-center text-blue-500" x-show="message.type === 'info'">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg>
            </div>
            <div class="text-center text-yellow-500" x-show="message.type === 'warning'">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                </svg>
            </div>
            <div class="text-center text-red-500" x-show="message.type === 'error'">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </div>
            <div x-text="message.title" class="h4 mb-0 fw-normal text-center text-gray-700"></div>
            <div x-text="message.content" class="text-gray-600 text-center"></div>
            <div class="d-flex justify-content-center">
                <x-bs::button.success x-show="message.type === 'success'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.success>
                <x-bs::button.primary x-show="message.type === 'info'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.primary>
                <x-bs::button.warning x-show="message.type === 'warning'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.warning>
                <x-bs::button.danger x-show="message.type === 'error'" data-bs-dismiss="modal" class="px-4">{{ __("OK") }}</x-bs::button.danger>
            </div>
        </div>
    </x-bs::modal.body>
</x-bs::modal>
