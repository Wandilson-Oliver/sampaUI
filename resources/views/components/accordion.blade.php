@props(['items' => []])

<div {{ $attributes->merge(['class' => 'divide-y divide-light rounded-default border border-light bg-white']) }}>
    @foreach ($items as $index => $item)
        <div x-data="{ open: @js((bool) ($item['open'] ?? false)) }">
            <button type="button" class="flex w-full cursor-pointer items-center justify-between gap-4 px-5 py-4 text-left text-sm font-semibold text-secondary transition hover:text-primary" x-on:click="open = ! open" x-bind:aria-expanded="open.toString()">
                <span>{{ $item['title'] ?? 'Item' }}</span>
                <i class="bi bi-chevron-down transition" x-bind:class="open ? 'rotate-180' : ''" aria-hidden="true"></i>
            </button>
            <div x-cloak x-show="open" x-transition.opacity.duration.150ms class="px-5 pb-4 text-sm leading-6 text-secondary">
                {!! $item['content'] ?? '' !!}
            </div>
        </div>
    @endforeach
    {{ $slot }}
</div>
