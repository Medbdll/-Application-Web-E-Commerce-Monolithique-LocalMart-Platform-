@props(['on'])

@if ($on && $errors->isEmpty())
    <div {{ $attributes }}>
        <div class="text-sm text-green-600">
            {{ $slot }}
        </div>
    </div>
@endif
