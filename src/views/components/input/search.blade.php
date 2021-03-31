@props([
    'error'       => NULL
])

<input type="search" {{ $attributes->merge(['class' => 'form-control']) }} {{ $attributes }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
