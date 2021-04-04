@props([
    'event' => 'toast-notification'
])

<div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 9999">
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3"
         x-data
         x-init="
            window.addEventListener('{{ $event }}', notification => {
                let message = notification.detail;
                let toast = $el.querySelector('template').content.firstElementChild.cloneNode(true);

                if (message.type === 'success') {
                    toast.querySelector('em').classList.add('fa-check-circle', 'text-success');
                }
                else if (message.type === 'info') {
                    toast.querySelector('em').classList.add('fa-info-circle', 'text-primary');
                }
                else if (message.type === 'warning') {
                    toast.querySelector('em').classList.add('fa-exclamation-circle', 'text-warning');
                }
                else if (message.type === 'error') {
                    toast.querySelector('em').classList.add('fa-times-circle', 'text-danger');
                }

                toast.querySelector('.title').innerText = message.title;
                if (message.content.length > 0) {
                    toast.querySelector('.content').innerText = message.content;
                } else {
                    toast.querySelector('.content').remove();
                    toast.querySelector('.body').classList.replace('align-items-start', 'align-items-center');
                }

                $el.appendChild(toast);

                new bootstrap.Toast(toast, {
                    autohide: message.autohide,
                    delay: message.delay ? message.delay : 5000
                }).show();
                toast.addEventListener('hidden.bs.toast', () => {
                    bootstrap.Toast.getInstance(toast).dispose();
                    toast.remove();
                });
            });
        "
    >
        <template class="full" hidden>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="body d-flex p-3 align-items-start">
                    <em class="fa fa-2x"></em>
                    <div class="flex-grow-1 d-grid gap-2 ps-3">
                        <div class="title fs-5"></div>
                        <div class="content text-secondary"></div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </template>
    </div>
</div>