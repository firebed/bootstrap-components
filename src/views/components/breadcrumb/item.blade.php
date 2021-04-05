@props(['active' => FALSE])

@if($active)
    <li {{ $attributes->class('breadcrumb-item active') }} aria-current="page">{{ $slot }}</li>
@else
    <li {{ $attributes->class('breadcrumb-item') }}>{{ $slot }}</li>
@endif
