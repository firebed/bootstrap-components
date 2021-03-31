@props(['flush' => true])

<div class="list-group @if($flush) list-group-flush @endif">
    {{ $slot }}
</div>
