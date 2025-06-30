@props(['active' => false])

<a @if ($href) href="{{ $href }}" @endif {{ $attributes }} wire:navigate
    class="{{ $active ? 'underline text-black' : 'text-black' }} cursor-pointer rounded-md px-3 py-2 text-sm font-bold font-inter text-black hover:underline"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
