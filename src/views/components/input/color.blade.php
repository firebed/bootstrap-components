@props([
    'error'       => NULL
])

<input type="color" {{ $attributes->merge(['class' => ($error && $errors->has($error) ? ' is-invalid' : '')]) }} {{ $attributes }}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif