<div {{ $attributes->merge(['class' => 'w-full max-w-md mx-auto']) }}>
    <div class="bg-white shadow-md rounded-lg px-8 py-6">
        {{ $slot }}
    </div>
</div>
