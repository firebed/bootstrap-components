<div
    x-data="{
        messages: [],
        remove(message) {
            this.messages.splice(this.messages.indexOf(message), 1)
        },
    }"
    @notify.window="let message = $event.detail; messages.push(message); setTimeout(() => { remove(message) }, 2500)"
    aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 9999"
>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <template x-for="(message, messageIndex) in messages" :key="messageIndex" hidden>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    {{--                    <img src="..." class="rounded me-2" alt="...">--}}
                    <strong x-text="message.title" class="me-auto"></strong>
                    <button @click="remove(message)" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div x-text="message.content" class="toast-body"></div>
            </div>
        </template>
    </div>
</div>
