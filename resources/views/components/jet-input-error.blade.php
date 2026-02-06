@props(['for'])

@if ($errors->has($for))
    <span {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
        {{ $errors->first($for) }}
    </span>
@endif
