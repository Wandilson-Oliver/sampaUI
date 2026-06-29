@props([
    'tabs' => [],
    'active' => null,
])

@php
    $firstKey = array_key_first($tabs);
    $initial = $active ?? $firstKey;
@endphp

<div {{ $attributes->merge(['class' => 'w-full']) }} x-data="{ active: @js($initial) }">
    <div class="flex flex-wrap gap-2 border-b border-border" role="tablist">
        @foreach ($tabs as $key => $label)
            <button
                type="button"
                class="cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition"
                x-bind:class="active === @js($key) ? 'border-primary text-primary' : 'border-transparent text-secondary hover:text-primary'"
                x-on:click="active = @js($key)"
                role="tab"
                x-bind:aria-selected="(active === @js($key)).toString()"
            >
                {{ $label }}
            </button>
        @endforeach
    </div>

    <div class="pt-4">
        {{ $slot }}
    </div>
</div>
