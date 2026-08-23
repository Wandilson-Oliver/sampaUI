@props([
    'items' => [],
    'multiple' => true,
])

@php
    $id = $attributes->get('id') ?? 'sampaui-accordion-'.uniqid();
    $openItems = collect($items)
        ->mapWithKeys(fn (mixed $item, int|string $index): array => [$index => (bool) (is_array($item) && ($item['open'] ?? false))])
        ->all();

    if (! $multiple && count(array_filter($openItems)) > 1) {
        $firstOpen = array_key_first(array_filter($openItems));
        $openItems = [$firstOpen => true];
    }
@endphp

<div
    x-data="{
        openItems: @js($openItems),
        toggle(index) {
            if (@js($multiple)) {
                this.openItems[index] = ! this.openItems[index];
                return;
            }

            this.openItems = this.openItems[index] ? {} : { [index]: true };
        },
    }"
    {{ $attributes->merge(['class' => 'divide-y divide-border rounded-default border border-border bg-surface']) }}
>
    @foreach ($items as $index => $item)
        <div>
            <button
                id="{{ $id }}-trigger-{{ $index }}"
                type="button"
                class="flex w-full cursor-pointer items-center justify-between gap-4 px-5 py-4 text-left text-sm font-semibold text-secondary transition hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
                x-on:click="toggle(@js($index))"
                x-bind:aria-expanded="Boolean(openItems[@js($index)]).toString()"
                aria-controls="{{ $id }}-panel-{{ $index }}"
            >
                <span>{{ $item['title'] ?? 'Item' }}</span>
                <i class="bi bi-chevron-down transition" x-bind:class="openItems[@js($index)] ? 'rotate-180' : ''" aria-hidden="true"></i>
            </button>
            <div
                id="{{ $id }}-panel-{{ $index }}"
                role="region"
                aria-labelledby="{{ $id }}-trigger-{{ $index }}"
                x-cloak
                x-show="openItems[@js($index)]"
                x-transition.opacity.duration.150ms
                class="px-5 pb-4 text-sm leading-6 text-secondary"
            >
                {!! $item['content'] ?? '' !!}
            </div>
        </div>
    @endforeach
    {{ $slot }}
</div>
