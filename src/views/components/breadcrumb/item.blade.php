@props(['active' => FALSE])

@if($active)
    <li {{ $attributes->merge(['class' => 'breadcrumb-item active']) }} aria-current="page">{{ $slot }}</li>
@else
    <li {{ $attributes->merge(['class' => 'breadcrumb-item']) }}>{{ $slot }}</li>
@endif
