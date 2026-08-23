@props([
    'name' => 'Contato',
    'subtitle' => null,
    'avatar' => null,
    'status' => 'online',
    'backButton' => true,
    'autoScroll' => true,
    'empty' => false,
    'emptyTitle' => 'Nenhuma mensagem ainda',
    'emptyDescription' => 'Envie a primeira mensagem para iniciar a conversa.',
])

<section
    x-data="SampaUI.chatConversation({ autoScroll: @js($autoScroll) })"
    {{ $attributes->merge(['class' => 'flex h-full min-h-0 flex-col bg-light/40']) }}
>
    {{-- Header da Conversa --}}
    @isset($header)
        {{ $header }}
    @else
        <header class="flex items-center justify-between gap-3 border-b border-border/80 bg-surface px-4 py-3 sm:px-5">
            <div class="flex min-w-0 items-center gap-3">
                @if ($backButton)
                    <x-sampaui::button
                        variant="ghost"
                        icon="chevron-left"
                        rounded
                        class="shrink-0 lg:hidden"
                        x-on:click="$dispatch('chat:back')"
                        aria-label="Voltar para conversas"
                    />
                @endif

                <div class="relative shrink-0">
                    <x-sampaui::avatar :src="$avatar" :name="$name" :status="$status" />
                </div>

                <div class="min-w-0">
                    <h2 class="truncate text-sm sm:text-base font-bold text-heading">{{ $name }}</h2>
                    @if ($subtitle)
                        <p class="mt-0.5 flex items-center gap-1.5 truncate text-xs font-medium text-secondary/70">
                            @if ($status === 'online')
                                <span class="relative flex h-2 w-2">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                                </span>
                            @elseif ($status === 'away')
                                <span class="h-2 w-2 shrink-0 rounded-full bg-amber-400" aria-hidden="true"></span>
                            @elseif ($status === 'busy')
                                <span class="h-2 w-2 shrink-0 rounded-full bg-rose-500" aria-hidden="true"></span>
                            @elseif ($status)
                                <span class="h-2 w-2 shrink-0 rounded-full bg-muted" aria-hidden="true"></span>
                            @endif
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>
            </div>

            @isset($actions)
                <div class="flex shrink-0 items-center gap-1 sm:gap-2">{{ $actions }}</div>
            @endisset
        </header>
    @endisset

    {{-- Timeline de Mensagens --}}
    <div
        x-ref="messages"
        class="sampaui-chat-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain px-3 py-5 sm:px-6 sm:py-6"
        role="log"
        aria-live="polite"
        aria-label="Mensagens com {{ $name }}"
    >
        @if ($empty)
            <div class="flex h-full min-h-[16rem] items-center justify-center">
                <x-sampaui::empty-state :title="$emptyTitle" :description="$emptyDescription" icon="chat-left-dots" />
            </div>
        @else
            <div class="mx-auto flex max-w-3xl flex-col gap-3.5">
                {{ $slot }}
            </div>
        @endif
    </div>

    {{-- Composer de Envio --}}
    @isset($composer)
        <footer class="border-t border-border/80 bg-surface p-3 sm:p-4">
            {{ $composer }}
        </footer>
    @endisset
</section>
