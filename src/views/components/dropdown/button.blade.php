<button type="button" {{ $attributes->merge(['class' => 'btn dropdown-toggle']) }} data-bs-toggle="dropdown" aria-expanded="false" {{ $attributes }}>
    {{ $slot }}
</button>