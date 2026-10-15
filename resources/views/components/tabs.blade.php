@props([
    'tabs' => [],
    'active' => null,
])

@php
    $firstKey = array_key_first($tabs);
    $initial = $active ?? $firstKey;
    $customClasses = (string) $attributes->get('class', '');
    $classes = sampaui_merge_tailwind_classes('w-full', $customClasses);
@endphp

<div {{ $attributes->except('class')->merge(['class' => $classes]) }} x-data="{ active: @js($initial) }">
    <div class="flex flex-wrap gap-2 border-b border-border dark:border-slate-800" role="tablist">
        @foreach ($tabs as $key => $label)
            <button
                type="button"
                class="cursor-pointer border-b-2 px-4 py-2 text-sm font-medium transition"
                x-bind:class="active === @js($key) ? 'border-primary text-primary dark:text-primary' : 'border-transparent text-secondary dark:text-slate-400 hover:text-primary dark:hover:text-primary'"
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
