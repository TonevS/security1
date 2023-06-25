@props(['value'])

<span {{ $attributes->merge(['class' => 'inline-block float-right font-medium text-xs text-yellow-600']) }}>
    {{ $value ?? $slot }}
</span>
