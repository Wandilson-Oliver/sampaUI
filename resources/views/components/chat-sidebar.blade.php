@props([
    'title' => 'Conversas',
    'subtitle' => null,
    'conversations' => [],
    'searchPlaceholder' => 'Buscar conversa',
    'searchName' => 'chat_search',
    'searchable' => true,
    'emptyTitle' => 'Nenhuma conversa',
    'emptyDescription' => 'As conversas recentes aparecerão aqui.',
])

@php
    $modelAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model') || $attributeName === 'x-model'
    );
@endphp

<div {{ $attributes->whereDoesntStartWith('wire:model')->except('x-model')->merge(['class' => 'flex h-full min-h-0 flex-col bg-surface']) }}>
    {{-- Header da Sidebar --}}
    @isset($header)
        {{ $header }}
    @else
        <div class="border-b border-border/80 px-4 py-4 sm:px-5">
            <div class="flex items-center justify-between gap-3">
                <div class="min-w-0">
                    <h2 class="truncate text-base font-bold tracking-tight text-heading">{{ $title }}</h2>
                    @if ($subtitle)
                        <p class="mt-0.5 truncate text-xs font-medium text-secondary/70">{{ $subtitle }}</p>
                    @endif
                </div>

                @isset($actions)
                    <div class="flex shrink-0 items-center gap-1.5">{{ $actions }}</div>
                @endisset
            </div>

            @if ($searchable && $searchPlaceholder)
                <div class="mt-3.5">
                    <label class="relative block">
                        <span class="sr-only">{{ $searchPlaceholder }}</span>
                        <i class="bi bi-search pointer-events-none absolute inset-y-0 left-3.5 flex items-center text-sm text-secondary/45" aria-hidden="true"></i>
                        <input
                            type="search"
                            name="{{ $searchName }}"
                            placeholder="{{ $searchPlaceholder }}"
                            class="{{ sampaui_field_classes(classes: ['py-2 pl-9.5 pr-3 text-xs sm:text-sm rounded-xl']) }}"
                            {{ $modelAttributes }}
                        >
                    </label>
                </div>
            @endif
        </div>
    @endisset

    {{-- Lista com Scroll --}}
    <div class="sampaui-chat-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain p-2.5 space-y-1">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @elseif (count($conversations) > 0)
            @foreach ($conversations as $conversation)
                @php
                    $active = (bool) ($conversation['active'] ?? false);
                    $unread = (int) ($conversation['unread'] ?? 0);
                    $href = $conversation['href'] ?? null;
                    $wireClick = $conversation['wireClick'] ?? $conversation['wire:click'] ?? null;
                    $conversationId = $conversation['id'] ?? $loop->index;
                    $tag = $href ? 'a' : 'button';
                    $isTyping = ! empty($conversation['typing']);
                    $itemTag = $conversation['tag'] ?? null;
                @endphp

                <{{ $tag }}
                    @if ($href) href="{{ $href }}" @else type="button" @endif
                    @if ($wireClick) wire:click="{{ $wireClick }}" @endif
                    class="{{ sampaui_classes([
                        'group flex w-full cursor-pointer items-center gap-3 rounded-xl border px-3 py-3 text-left transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-primary/20',
                        $active
                            ? 'border-primary/20 bg-primary/10 text-primary shadow-xs'
                            : 'border-transparent hover:border-border/60 hover:bg-light/80 text-secondary',
                    ]) }}"
                    @if ($active) aria-current="true" @endif
                    x-on:click="$dispatch('chat:open-conversation', { id: @js($conversationId), name: @js($conversation['name'] ?? 'Contato') })"
                >
                    {{-- Avatar com Indicador de Status --}}
                    <div class="relative shrink-0">
                        <x-sampaui::avatar
                            :src="$conversation['avatar'] ?? $conversation['photo'] ?? null"
                            :name="$conversation['name'] ?? null"
                            :status="$conversation['status'] ?? null"
                        />
                    </div>

                    {{-- Conteúdo do Contato --}}
                    <span class="min-w-0 flex-1">
                        <span class="flex items-center justify-between gap-2">
                            <span class="truncate text-sm font-semibold {{ $active ? 'text-primary' : 'text-heading' }}">
                                {{ $conversation['name'] ?? 'Contato' }}
                            </span>
                            @if (! empty($conversation['time']))
                                <time class="shrink-0 text-[0.6875rem] font-medium {{ $active ? 'text-primary/70' : 'text-secondary/50' }}">
                                    {{ $conversation['time'] }}
                                </time>
                            @endif
                        </span>

                        <span class="mt-1 flex items-center justify-between gap-2">
                            <span class="truncate text-xs leading-4 {{ $isTyping ? 'font-semibold text-emerald-600 animate-pulse' : ($active ? 'text-primary/80' : 'text-secondary/70') }}">
                                @if ($isTyping)
                                    <span class="inline-flex items-center gap-1">
                                        <i class="bi bi-chat-dots-fill text-xs" aria-hidden="true"></i>
                                        Digitando...
                                    </span>
                                @else
                                    {{ $conversation['preview'] ?? $conversation['message'] ?? '' }}
                                @endif
                            </span>

                            <span class="flex items-center gap-1.5 shrink-0">
                                @if ($itemTag)
                                    <span class="rounded-md bg-light px-1.5 py-0.5 text-[0.625rem] font-semibold text-secondary/80 border border-border/50">
                                        {{ $itemTag }}
                                    </span>
                                @endif

                                @if ($unread > 0)
                                    <span class="inline-flex h-5 min-w-5 shrink-0 items-center justify-center rounded-full bg-primary px-1.5 text-[0.6875rem] font-bold text-white shadow-xs" aria-label="{{ $unread }} mensagens não lidas">
                                        {{ $unread > 99 ? '99+' : $unread }}
                                    </span>
                                @endif
                            </span>
                        </span>
                    </span>
                </{{ $tag }}>
            @endforeach
        @else
            <div class="flex h-full min-h-[14rem] items-center justify-center p-4">
                <x-sampaui::empty-state :title="$emptyTitle" :description="$emptyDescription" icon="chat-left-dots" />
            </div>
        @endif
    </div>

    {{-- Footer opcional --}}
    @isset($footer)
        <div class="border-t border-border/80 bg-surface px-4 py-3 sm:px-5">
            {{ $footer }}
        </div>
    @endisset
</div>
