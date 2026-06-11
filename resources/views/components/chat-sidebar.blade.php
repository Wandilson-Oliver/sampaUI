@props([
    'title' => 'Conversas',
    'subtitle' => null,
    'conversations' => [],
    'searchPlaceholder' => 'Buscar conversa',
])

@php
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model')->except('x-model')->merge(['class' => 'flex h-full min-h-0 flex-col bg-white']) }}>
    <div class="border-b border-light p-4">
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <h2 class="text-base font-semibold text-primary">{{ $title }}</h2>
                @if ($subtitle)
                    <p class="mt-1 text-xs font-medium text-secondary/70">{{ $subtitle }}</p>
                @endif
            </div>

            @isset($actions)
                <div class="shrink-0">{{ $actions }}</div>
            @endisset
        </div>

        @if ($searchPlaceholder)
            <div class="mt-4">
                <x-sampaui::input name="chat_search" icon="search" placeholder="{{ $searchPlaceholder }}" {{ $modelAttributes }} />
            </div>
        @endif
    </div>

    <div class="min-h-0 flex-1 overflow-y-auto p-2">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <div class="space-y-1">
                @foreach ($conversations as $conversation)
                    @php
                        $active = (bool) ($conversation['active'] ?? false);
                        $unread = (int) ($conversation['unread'] ?? 0);
                    @endphp

                    <button
                        type="button"
                        class="{{ sampaui_classes([
                            'flex w-full cursor-pointer items-center gap-3 rounded-default px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-primary/20',
                            $active ? 'bg-primary/10 text-primary' : 'hover:bg-light/70',
                        ]) }}"
                    >
                        <x-sampaui::avatar
                            :src="$conversation['avatar'] ?? null"
                            :name="$conversation['name'] ?? null"
                            :status="$conversation['status'] ?? null"
                        />
                        <span class="min-w-0 flex-1">
                            <span class="flex items-center justify-between gap-3">
                                <span class="truncate text-sm font-semibold text-primary">{{ $conversation['name'] ?? 'Contato' }}</span>
                                @if (! empty($conversation['time']))
                                    <span class="shrink-0 text-xs font-medium text-secondary/60">{{ $conversation['time'] }}</span>
                                @endif
                            </span>
                            <span class="mt-1 flex items-center justify-between gap-3">
                                <span class="truncate text-xs leading-5 text-secondary">{{ $conversation['preview'] ?? '' }}</span>
                                @if ($unread > 0)
                                    <span class="inline-flex h-5 min-w-5 shrink-0 items-center justify-center rounded-full bg-primary px-1.5 text-[0.68rem] font-semibold text-white">{{ $unread }}</span>
                                @endif
                            </span>
                        </span>
                    </button>
                @endforeach
            </div>
        @endif
    </div>
</div>
