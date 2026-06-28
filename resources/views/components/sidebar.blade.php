@props([
    'brand' => 'SampaUI',
    'brandHref' => '#',
    'brandIcon' => null,
    'logo' => null,
    'logoAlt' => null,
    'items' => [],
    'sections' => [],
    'user' => null,
    'avatar' => null,
    'avatarAlt' => null,
    'initialState' => null,
    'collapsed' => false,
    'collapsible' => true,
    'closeEvent' => 'sampaui:sidebar-close',
    'openEvent' => 'sampaui:sidebar-open',
    'stateEvent' => 'sampaui:sidebar-state',
    'rail' => false,
    'activeColor' => null,
    'logoutHref' => null,
    'logoutLabel' => 'Sair do sistema',
    'position' => 'fixed',
])

@php
    $normalizedSections = [];

    if (count($items) > 0) {
        $normalizedSections[] = ['label' => null, 'items' => $items];
    }

    foreach ($sections as $section) {
        $normalizedSections[] = [
            'label' => $section['label'] ?? null,
            'items' => $section['items'] ?? [],
        ];
    }

    $sidebarId = $attributes->get('id') ?? 'sampaui-sidebar-'.\Illuminate\Support\Str::random(6);
    $userName = is_array($user) ? ($user['name'] ?? 'Usuario') : null;
    $userEmail = is_array($user) ? ($user['email'] ?? null) : null;
    $userAvatar = is_array($user) ? ($user['avatar'] ?? $avatar) : $avatar;
    $userAvatarAlt = $avatarAlt ?? $userName ?? 'Avatar';
    $startsCollapsed = $initialState ? in_array($initialState, ['closed', 'collapsed'], true) : (bool) $collapsed;
    $logoAltText = $logoAlt ?? $brand;
    $activeTextStyle = $activeColor ? 'color: '.$activeColor.';' : null;
    $isFixed = $position !== 'static';
    $positionClasses = $isFixed
        ? 'fixed inset-y-0 left-0 h-screen md:translate-x-0'
        : 'relative h-full';
@endphp

<aside
    id="{{ $sidebarId }}"
    {{ $attributes->except('id')->merge(['class' => "{$positionClasses} z-50 flex flex-col border-r border-border bg-surface text-secondary transition-[width,transform] duration-300 ease-out"]) }}
    style="width: {{ $startsCollapsed ? '6rem' : '20rem' }};"
    x-data="{ open: false, collapsed: @js($startsCollapsed), stateEvent: @js($stateEvent), sidebarId: @js($sidebarId), width() { return this.collapsed ? '6rem' : '20rem' }, emitState() { window.dispatchEvent(new CustomEvent(this.stateEvent, { detail: { id: this.sidebarId, collapsed: this.collapsed, width: this.width() } })) }, setCollapsed(value) { this.collapsed = value; this.emitState() }, toggle() { this.setCollapsed(! this.collapsed) } }"
    x-init="emitState()"
    x-on:{{ $openEvent }}.window="open = true; setCollapsed(false)"
    x-on:{{ $closeEvent }}.window="open = false; setCollapsed(true)"
    @if ($isFixed) x-bind:class="open ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" @endif
    x-bind:style="`width: ${width()};`"
    aria-label="Navegacao principal"
>
    @if ($rail)
        <span class="pointer-events-none absolute inset-y-0 -right-7 hidden w-7 bg-light md:block" aria-hidden="true"></span>
    @endif

    @if ($collapsible)
        <button
            type="button"
            class="absolute -right-5 top-7 z-10 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-default border border-border bg-surface text-secondary/60 shadow-sm transition hover:border-primary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary/20"
            x-on:click.prevent.stop="window.matchMedia('(max-width: 767px)').matches ? (open = false, setCollapsed(true)) : toggle()"
            x-bind:aria-label="window.matchMedia('(max-width: 767px)').matches ? 'Fechar navegacao' : (collapsed ? 'Expandir navegacao' : 'Recolher navegacao')"
        >
            <i class="bi bi-chevron-left text-lg leading-none" x-show="! collapsed" aria-hidden="true"></i>
            <i class="bi bi-chevron-right text-lg leading-none" x-show="collapsed" x-cloak aria-hidden="true"></i>
        </button>
    @endif

    <div class="shrink-0 pb-12 pt-10" x-bind:class="collapsed ? 'px-0' : 'px-8'">
        <a href="{{ $brandHref }}" class="flex cursor-pointer items-center gap-4 text-secondary" x-bind:class="collapsed ? 'justify-center' : ''">
            @if ($logo instanceof \Illuminate\View\ComponentSlot)
                {{ $logo }}
            @elseif (is_string($logo) && $logo !== '')
                <img src="{{ $logo }}" alt="{{ $logoAltText }}" class="block h-11 w-16 shrink-0 object-contain">
            @elseif (isset($brandMark))
                {{ $brandMark }}
            @else
                <x-sampaui::brand-mark :icon="$brandIcon" />
            @endisset

            <span class="truncate text-2xl font-bold leading-none tracking-tight text-secondary" x-bind:class="collapsed ? 'md:hidden' : ''">
                {{ $brand }}
            </span>
        </a>
    </div>

    @if (is_array($user))
        <div class="shrink-0 pb-12" x-bind:class="collapsed ? 'px-0' : 'px-8'">
            <div class="flex min-w-0 items-center gap-5" x-bind:class="collapsed ? 'justify-center' : ''">
                <span class="inline-flex aspect-square h-14 min-h-14 w-14 min-w-14 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-primary bg-light text-base font-semibold text-primary">
                    @if ($userAvatar)
                        <img src="{{ $userAvatar }}" alt="{{ $userAvatarAlt }}" class="block aspect-square h-full min-h-full w-full min-w-full rounded-full object-cover">
                    @else
                        {{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($userName, 0, 1)) }}
                    @endif
                </span>

                <div class="min-w-0" x-bind:class="collapsed ? 'md:hidden' : ''">
                    <p class="truncate text-base font-semibold leading-tight text-secondary">{{ $userName }}</p>
                    @if ($userEmail)
                        <p class="mt-1 truncate text-sm leading-tight text-secondary/45">{{ $userEmail }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <nav class="sampaui-sidebar-scroll min-h-0 flex-1 overflow-y-auto overscroll-contain pb-8" x-bind:class="collapsed ? 'px-0' : 'px-8'" aria-label="Menu">
        <div class="flex flex-col gap-5">
            @foreach ($normalizedSections as $section)
                <div class="flex flex-col gap-2">
                    @if ($section['label'])
                        <p class="px-1 pb-1 pt-2 text-base font-medium text-muted" x-bind:class="collapsed ? 'md:hidden' : ''">
                            {{ $section['label'] }}
                        </p>
                    @endif

                    <div class="flex flex-col gap-3">
                        @foreach ($section['items'] as $item)
                            @php
                                $active = (bool) ($item['active'] ?? false);
                                $href = $item['href'] ?? '#';
                                $icon = $item['icon'] ?? 'circle';
                                $label = $item['label'] ?? 'Item';
                            @endphp

                            <a
                                href="{{ $href }}"
                                @if (($item['navigate'] ?? false) && $href !== '#') wire:navigate @endif
                                @class([
                                    'group flex cursor-pointer items-center gap-5 rounded-default text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-primary/20',
                                    'text-primary' => $active,
                                    'text-secondary/65 hover:bg-light/60 hover:text-secondary' => ! $active,
                                ])
                                @if ($active && $activeTextStyle) style="{{ $activeTextStyle }}" @endif
                                x-bind:class="collapsed ? 'justify-center px-0 py-2' : 'px-1 py-2'"
                                @if ($active) aria-current="page" @endif
                                x-on:click="open = false"
                            >
                                <span class="inline-flex aspect-square h-12 min-h-12 w-12 min-w-12 shrink-0 items-center justify-center">
                                    <span
                                        @class([
                                            'inline-flex aspect-square h-12 min-h-12 w-12 min-w-12 items-center justify-center rounded-default transition',
                                            'text-primary' => $active,
                                            'text-secondary/45 group-hover:text-primary' => ! $active,
                                        ])
                                        @if ($active && $activeTextStyle) style="{{ $activeTextStyle }}" @endif
                                    >
                                        <i class="bi bi-{{ $icon }} text-[1.35rem] leading-none" aria-hidden="true"></i>
                                    </span>
                                </span>

                                <span
                                    @class([
                                        'truncate',
                                        'font-semibold' => $active,
                                        'group-hover:text-secondary' => ! $active,
                                    ])
                                    @if ($active && $activeTextStyle) style="{{ $activeTextStyle }}" @endif
                                    x-bind:class="collapsed ? 'md:hidden' : ''"
                                >
                                    {{ $label }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </nav>

    @if ($logoutHref || isset($footer))
        <div class="shrink-0 pb-10 pt-4" x-bind:class="collapsed ? 'px-0' : 'px-8'">
            @isset($footer)
                {{ $footer }}
            @else
                <a
                    href="{{ $logoutHref }}"
                    class="group flex cursor-pointer items-center gap-5 rounded-default text-base font-medium text-danger transition hover:bg-danger/10 focus:outline-none focus:ring-2 focus:ring-danger/20"
                    x-bind:class="collapsed ? 'justify-center px-0 py-2' : 'px-1 py-2'"
                >
                    <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-default transition">
                        <i class="bi bi-box-arrow-right text-[1.35rem] leading-none" aria-hidden="true"></i>
                    </span>
                    <span class="truncate" x-bind:class="collapsed ? 'md:hidden' : ''">{{ $logoutLabel }}</span>
                </a>
            @endisset
        </div>
    @endif
</aside>
