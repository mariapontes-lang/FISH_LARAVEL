@props(['class' => 'h-5 w-5'])

<svg {{ $attributes->merge([
    'class' => $class,
    'viewBox' => '0 0 24 24',
    'fill' => 'none',
    'stroke' => 'currentColor',
    'stroke-width' => '1.7',
    'stroke-linecap' => 'round',
    'stroke-linejoin' => 'round',
    'aria-hidden' => 'true',
]) }}>
    <path d="M3.5 12c2.8-3.9 6.1-5.9 9.6-5.9 4.4 0 7.7 2.6 7.7 5.9s-3.3 5.9-7.7 5.9c-3.5 0-6.8-2-9.6-5.9Z" />
    <path d="M3.5 12 1.8 8.2v7.6L3.5 12Z" />
    <circle cx="16.6" cy="10.8" r=".8" fill="currentColor" stroke="none" />
</svg>
