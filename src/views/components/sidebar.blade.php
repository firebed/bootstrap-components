@php
    $company = $company ?? ''
@endphp

<div class="col-auto w-100 w-lg-17r px-0 sticky-top" x-data="{ show: false }">
    <div class="d-flex justify-content-between align-items-center sticky-top px-3" style="height: 3.5rem; background-color: rgb(49, 58, 70);">
        <div class="fs-5 fw-500 text-light d-flex justify-content-between">
            <div class="bg-pink-500 rounded w-2r text-center me-2">
                {{ Str::of($company)->ucfirst()->substr(0, 1) }}
            </div>
            <div>{{ $company }}</div>
        </div>

        <x-bs::button.primary class="d-lg-none" x-on:click="show = !show">
            <em class="fa fa-bars"></em>
        </x-bs::button.primary>
    </div>

    <div :class="{ 'show': show }" class="sidebar sticky-lg-top w-lg-17r overflow-auto scrollbar" data-bs-backdrop="false" style="--top: 3.5rem">
        <div class="d-grid pb-5">
            {{ $slot }}
        </div>
    </div>
</div>
