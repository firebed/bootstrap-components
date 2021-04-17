@props(['flush' => true])

<div {{ $attributes->class(['list-group', 'list-group-flush' => $flush]) }}>
    {{ $slot }}
</div>
