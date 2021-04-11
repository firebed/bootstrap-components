@props([
    'error' => NULL,
    'size'  => NULL,
    'plaintext' => FALSE
])

<input {{ $attributes
    ->merge(['type' => 'text'])
    ->class([
        'form-control' => $plaintext === FALSE,
        'form-control-plaintext' => $plaintext === TRUE,
        'is-invalid' => $error && $errors->has($error),
        'form-control-sm' => $size === 'sm',
        'form-control-lg' => $size === 'lg'
    ])
}}>

@if($error)
    @error($error)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
@endif
