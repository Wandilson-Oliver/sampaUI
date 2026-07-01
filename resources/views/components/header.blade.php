@props([
    'title' => 'Dashboard',
    'subtitle' => null,
    'eyebrow' => null,
    'status' => null,
    'menu' => false,
    'menuEvent' => 'sampaui:sidebar-open',
    'ariaLabel' => null,
    'search' => false,
    'searchName' => 'header_search',
    'searchModel' => null,
    'searchPlaceholder' => 'Buscar...',
    'notifications' => false,
    'notificationCount' => 0,
    'notificationEvent' => 'sampaui:notifications-open',
    'sticky' => false,
])

@php
    $id = $attributes->get('id') ?? 'sampaui-header-'.uniqid();
    $titleId = $id.'-title';
    $hasCenter = isset($center) || $search;
    $hasRight = $status || $notifications || isset($actions) || isset($right);
@endphp

<header
    id="{{ $id }}"
    @if ($ariaLabel) aria-label="{{ $ariaLabel }}" @elseif ($title && ! isset($left)) aria-labelledby="{{ $titleId }}" @elseif ($title) aria-label="{{ $title }}" @endif
    {{ $attributes->except('id')->merge(['class' => sampaui_classes([
        'rounded-default border border-border bg-surface px-4 py-3 shadow-sm shadow-secondary/5 sm:px-5 sm:py-4',
        'sticky top-0 z-40' => $sticky,
    ])]) }}
>
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:gap-5">
        <div class="flex min-w-0 items-center gap-3 lg:flex-1">
            @isset($left)
                {{ $left }}
            @else
                @if ($menu)
                    <x-sampaui::button
                        variant="ghost"
                        icon="list"
                        rounded
                        class="shrink-0 border border-border md:hidden"
                        x-on:click="$dispatch('{{ $menuEvent }}')"
                        aria-label="Abrir navegacao"
                    />
                @endif

                <div class="min-w-0">
                    @if ($eyebrow)
                        <p class="mb-1 text-xs font-semibold uppercase tracking-[0.18em] text-primary">{{ $eyebrow }}</p>
                    @endif

                    <h1 id="{{ $titleId }}" class="truncate text-xl font-semibold tracking-tight text-secondary sm:text-2xl">
                        {{ $title }}
                    </h1>

                    @if ($subtitle)
                        <p class="mt-1 truncate text-sm leading-5 text-secondary/65">{{ $subtitle }}</p>
                    @endif
                </div>
            @endisset
        </div>

        @if ($hasCenter)
            <div class="min-w-0 lg:w-full lg:max-w-md lg:flex-1">
                @isset($center)
                    {{ $center }}
                @else
                    @if ($searchModel)
                        <x-sampaui::input
                            type="search"
                            name="{{ $searchName }}"
                            icon="search"
                            placeholder="{{ $searchPlaceholder }}"
                            class="py-2 text-sm"
                            wire:model.live.debounce.300ms="{{ $searchModel }}"
                        />
                    @else
                        <x-sampaui::input
                            type="search"
                            name="{{ $searchName }}"
                            icon="search"
                            placeholder="{{ $searchPlaceholder }}"
                            class="py-2 text-sm"
                        />
                    @endif
                @endisset
            </div>
        @endif

        @if ($hasRight)
            <div class="flex w-full flex-wrap items-center gap-2 lg:ml-auto lg:!w-auto lg:shrink-0 lg:justify-end">
                @isset($right)
                    {{ $right }}
                @else
                    @if ($status)
                        <span class="inline-flex items-center gap-2 rounded-full border border-border bg-light px-3 py-1.5 text-xs font-medium text-secondary">
                            <span class="h-2 w-2 rounded-full bg-success"></span>
                            {{ $status }}
                        </span>
                    @endif

                    @if ($notifications)
                        <span class="relative inline-flex">
                            <x-sampaui::button
                                variant="ghost"
                                icon="bell"
                                rounded
                                class="border border-border"
                                x-on:click="$dispatch('{{ $notificationEvent }}')"
                                aria-label="Abrir notificacoes"
                            />
                            @if ((int) $notificationCount > 0)
                                <span class="pointer-events-none absolute -right-1 -top-1 inline-flex h-5 min-w-5 items-center justify-center rounded-full border-2 border-white bg-danger px-1 text-[0.625rem] font-bold text-white">
                                    {{ (int) $notificationCount > 99 ? '99+' : (int) $notificationCount }}
                                </span>
                            @endif
                        </span>
                    @endif

                    @isset($actions)
                        <div class="flex min-w-0 flex-1 flex-wrap items-center justify-end gap-2 lg:flex-none">
                            {{ $actions }}
                        </div>
                    @endisset
                @endisset
            </div>
        @endif
    </div>
</header>
