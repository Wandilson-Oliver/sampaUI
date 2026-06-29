@props([
    'title' => 'Conversas',
    'subtitle' => null,
    'conversations' => [],
    'searchPlaceholder' => 'Buscar conversa',
    'searchName' => 'chat_search',
    'emptyTitle' => 'Nenhuma conversa',
    'emptyDescription' => 'As conversas recentes aparecerao aqui.',
])

@php
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model')->except('x-model')->merge(['class' => 'flex h-full min-h-0 flex-col bg-surface']) }}>
    <div class="border-b border-border px-4 py-4 sm:px-5">
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <h2 class="text-base font-semibold text-secondary">{{ $title }}</h2>
                @if ($subtitle)
                    <p class="mt-1 text-xs font-medium text-secondary/60">{{ $subtitle }}</p>
                @endif
            </div>

            @isset($actions)
                <div class="shrink-0">{{ $actions }}</div>
            @endisset
        </div>

        @if ($searchPlaceholder)
            <div class="mt-4">
                <label class="relative block">
                    <span class="sr-only">{{ $searchPlaceholder }}</span>
                    <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3.5 flex items-center text-sm text-secondary/45" aria-hidden="true"></i>
                    <input
                        type="search"
                        name="{{ $searchName }}"
                        placeholder="{{ $searchPlaceholder }}"
                        class="{{ sampaui_field_classes(classes: ['py-2 pl-10 text-sm']) }}"
                        {{ $modelAttributes }}
                    >
                </label>
            </div>
        @endif
    </div>

    <div class="sampaui-chat-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain p-2">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @elseif (count($conversations) > 0)
            <div class="space-y-1">
                @foreach ($conversations as $conversation)
                    @php
                        $active = (bool) ($conversation['active'] ?? false);
                        $unread = (int) ($conversation['unread'] ?? 0);
                        $href = $conversation['href'] ?? null;
                        $wireClick = $conversation['wireClick'] ?? $conversation['wire:click'] ?? null;
                        $conversationId = $conversation['id'] ?? $loop->index;
                        $tag = $href ? 'a' : 'button';
                    @endphp

                    <{{ $tag }}
                        @if ($href) href="{{ $href }}" @else type="button" @endif
                        @if ($wireClick) wire:click="{{ $wireClick }}" @endif
                        class="{{ sampaui_classes([
                            'group flex w-full cursor-pointer items-center gap-3 rounded-default border border-transparent px-3 py-3 text-left transition focus:outline-none focus:ring-2 focus:ring-primary/20',
                            $active ? 'border-primary/20 bg-primary/10' : 'hover:border-border hover:bg-light/70',
                        ]) }}"
                        @if ($active) aria-current="true" @endif
                        x-on:click="$dispatch('chat:open-conversation', { id: @js($conversationId) })"
                    >
                        <x-sampaui::avatar
                            :src="$conversation['avatar'] ?? null"
                            :name="$conversation['name'] ?? null"
                            :status="$conversation['status'] ?? null"
                            class="shrink-0"
                        />
                        <span class="min-w-0 flex-1">
                            <span class="flex items-center justify-between gap-3">
                                <span class="truncate text-sm font-semibold {{ $active ? 'text-primary' : 'text-secondary' }}">{{ $conversation['name'] ?? 'Contato' }}</span>
                                @if (! empty($conversation['time']))
                                    <time class="shrink-0 text-[0.6875rem] font-medium text-secondary/45">{{ $conversation['time'] }}</time>
                                @endif
                            </span>
                            <span class="mt-1 flex items-center justify-between gap-3">
                                <span class="truncate text-xs leading-5 {{ ! empty($conversation['typing']) ? 'font-medium text-success' : 'text-secondary/60' }}">
                                    {{ ! empty($conversation['typing']) ? 'Digitando...' : ($conversation['preview'] ?? '') }}
                                </span>
                                @if ($unread > 0)
                                    <span class="inline-flex h-5 min-w-5 shrink-0 items-center justify-center rounded-full bg-primary px-1.5 text-[0.6875rem] font-semibold text-white" aria-label="{{ $unread }} mensagens nao lidas">{{ $unread > 99 ? '99+' : $unread }}</span>
                                @endif
                            </span>
                        </span>
                    </{{ $tag }}>
                @endforeach
            </div>
        @else
            <div class="flex h-full items-center justify-center p-4">
                <x-sampaui::empty-state :title="$emptyTitle" :description="$emptyDescription" icon="chat-left-dots" />
            </div>
        @endif
    </div>
</div>
