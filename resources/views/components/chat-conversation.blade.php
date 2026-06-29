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
    {{ $attributes->merge(['class' => 'flex h-full min-h-0 flex-col bg-light/60']) }}
>
    <header class="flex items-center justify-between gap-3 border-b border-border bg-surface px-3 py-3 sm:px-4">
        <div class="flex min-w-0 items-center gap-2 sm:gap-3">
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

            <x-sampaui::avatar :src="$avatar" :name="$name" :status="$status" />
            <div class="min-w-0">
                <h2 class="truncate text-sm font-semibold text-secondary">{{ $name }}</h2>
                @if ($subtitle)
                    <p class="mt-0.5 flex items-center gap-1.5 truncate text-xs font-medium text-secondary/60">
                        @if ($status)
                            <span class="{{ $status === 'online' ? 'bg-success' : 'bg-muted' }} h-1.5 w-1.5 shrink-0 rounded-full" aria-hidden="true"></span>
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

    <div
        x-ref="messages"
        class="sampaui-chat-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain px-3 py-5 sm:px-5 sm:py-6"
        role="log"
        aria-live="polite"
        aria-label="Mensagens com {{ $name }}"
    >
        @if ($empty)
            <div class="flex h-full items-center justify-center">
                <x-sampaui::empty-state :title="$emptyTitle" :description="$emptyDescription" icon="chat-left-dots" />
            </div>
        @else
            <div class="mx-auto flex max-w-3xl flex-col gap-3">
                {{ $slot }}
            </div>
        @endif
    </div>

    @isset($composer)
        <footer class="border-t border-border bg-surface p-3 sm:p-4">
            {{ $composer }}
        </footer>
    @endisset
</section>
