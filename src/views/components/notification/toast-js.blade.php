@props([
    'event' => 'toast-notification'
])

<div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 9999">
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3">
        <template hidden>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="body d-flex p-3 align-items-start">
                    <div class="success text-success d-none"><x-bs::icons.check-circle width="24" height="24"/></div>
                    <div class="info text-info d-none"><x-bs::icons.info-circle width="24" height="24"/></div>
                    <div class="warning text-warning d-none"><x-bs::icons.exclamation-circle width="24" height="24"/></div>
                    <div class="error text-danger d-none"><x-bs::icons.x-circle width="24" height="24"/></div>

                    <div class="flex-grow-1 d-grid gap-2 ps-3">
                        <div class="title" style="font-size: 1.1rem"></div>
                        <div class="content text-secondary"></div>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </template>
    </div>
</div>

@push('footer_scripts')
    <script>
        const notificationContainer = document.getElementById('toast-container');

        window.addEventListener('toast-notification', notification => {
            let message = notification.detail;
            let toast = notificationContainer.querySelector('template').content.firstElementChild.cloneNode(true);

            toast.querySelector('div.' + message.type).classList.remove('d-none');

            toast.querySelector('.title').innerText = message.title;
            if (message.content.length > 0) {
                toast.querySelector('.content').innerHTML = message.content;
            } else {
                toast.querySelector('.content').remove();
                toast.querySelector('.body').classList.replace('align-items-start', 'align-items-center');
            }

            notificationContainer.appendChild(toast);

            new bootstrap.Toast(toast, {
                autohide: message.autohide,
                delay: message.delay ? message.delay : 5000
            }).show();
            toast.addEventListener('hidden.bs.toast', () => {
                bootstrap.Toast.getInstance(toast).dispose();
                toast.remove();
            });
        });
    </script>
@endpush