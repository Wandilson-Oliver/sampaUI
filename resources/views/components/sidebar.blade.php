@props([
    'brandHref' => '#',
    'logoSrc' => null,
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
    $logoAltText = $logoAlt ?? 'Logo';
    $activeIconStyle = $activeColor
        ? 'color: '.$activeColor.';'
        : null;
    $isFixed = $position !== 'static';
    $positionClasses = $isFixed
        ? 'fixed inset-y-0 left-0 h-screen md:translate-x-0'
        : 'relative h-full';
@endphp

@if ($isFixed)
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition-opacity duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-40 bg-secondary/40 backdrop-blur-xs md:hidden"
        x-on:click="open = false; setCollapsed(true)"
        aria-hidden="true"
    ></div>
@endif

<aside
    id="{{ $sidebarId }}"
    {{ $attributes->except('id')->merge(['class' => "{$positionClasses} z-50 flex flex-col border-r border-border bg-surface text-secondary transition-[width,transform] duration-300 ease-out"]) }}
    style="width: {{ $startsCollapsed ? '6rem' : '18rem' }};"
    x-data="{ open: false, collapsed: @js($startsCollapsed), stateEvent: @js($stateEvent), sidebarId: @js($sidebarId), width() { return this.collapsed ? '6rem' : '18rem' }, emitState() { window.dispatchEvent(new CustomEvent(this.stateEvent, { detail: { id: this.sidebarId, collapsed: this.collapsed, width: this.width() } })) }, setCollapsed(value) { this.collapsed = value; this.emitState() }, toggle() { this.setCollapsed(! this.collapsed) } }"
    x-init="emitState()"
    x-on:{{ $openEvent }}.window="open = true; setCollapsed(false)"
    x-on:{{ $closeEvent }}.window="open = false; setCollapsed(true)"
    x-on:keydown.escape.window="if (open && window.matchMedia('(max-width: 767px)').matches) { open = false; setCollapsed(true); }"
    @if ($isFixed) x-bind:class="open ? 'translate-x-0' : '-translate-x-full md:translate-x-0'" @endif
    x-bind:style="`width: ${width()};`"
    aria-label="Navegacao principal"
>
    @if ($collapsible)
        <button
            type="button"
            class="absolute -right-5 top-6 z-10 inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-default border border-border bg-surface text-secondary/60 shadow-sm transition hover:border-purple hover:text-purple focus:outline-none focus:ring-2 focus:ring-purple/20"
            x-on:click.prevent.stop="window.matchMedia('(max-width: 767px)').matches ? (open = false, setCollapsed(true)) : toggle()"
            x-bind:aria-label="window.matchMedia('(max-width: 767px)').matches ? 'Fechar navegacao' : (collapsed ? 'Expandir navegacao' : 'Recolher navegacao')"
        >
            <i class="bi bi-chevron-left text-lg leading-none" x-show="! collapsed" aria-hidden="true"></i>
            <i class="bi bi-chevron-right text-lg leading-none" x-show="collapsed" x-cloak aria-hidden="true"></i>
        </button>
    @endif

    @if (isset($brand) || isset($header) || $logoSrc)
        <div class="shrink-0 pb-12 pt-7" x-bind:class="collapsed ? 'px-0' : 'px-8'">
            @isset($brand)
                {{ $brand }}
            @elseif (isset($header))
                {{ $header }}
            @elseif ($logoSrc)
                <a href="{{ $brandHref }}" class="flex cursor-pointer items-center text-secondary" x-bind:class="collapsed ? 'justify-center' : ''">
                    <img src="{{ $logoSrc }}" alt="{{ $logoAltText }}" class="block h-11 max-w-full shrink-0 object-contain">
                </a>
            @endif
        </div>
    @endif

    @if (isset($userSlot) || is_array($user))
        <div class="shrink-0 pb-14" x-bind:class="collapsed ? 'px-0' : 'px-8'">
            @isset($userSlot)
                {{ $userSlot }}
            @else
                <div class="flex min-w-0 items-center gap-5" x-bind:class="collapsed ? 'justify-center' : ''">
                    <span class="inline-flex aspect-square h-16 min-h-16 w-16 min-w-16 shrink-0 items-center justify-center overflow-hidden rounded-full border-2 border-purple bg-light text-base font-semibold text-purple">
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
            @endisset
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

                    <div class="flex flex-col gap-2">
                        @foreach ($section['items'] as $item)
                            @php
                                $active = (bool) ($item['active'] ?? false);
                                $href = $item['href'] ?? '#';
                                $icon = $item['icon'] ?? 'circle';
                                $label = $item['label'] ?? 'Item';
                                $badge = $item['badge'] ?? null;
                                $badgeVariant = $item['badgeVariant'] ?? $item['badge_variant'] ?? 'primary';
                                $badgeAppearance = $item['badgeAppearance'] ?? $item['badge_appearance'] ?? 'soft';
                                $children = $item['children'] ?? $item['items'] ?? $item['subitems'] ?? [];
                                $hasChildren = count($children) > 0;
                                $hasActiveChild = $hasChildren && collect($children)->contains(fn ($c) => (bool) ($c['active'] ?? false));
                                $isExpanded = $active || $hasActiveChild;
                            @endphp

                            @if ($hasChildren)
                                <div x-data="{ expanded: @js($isExpanded) }" class="flex flex-col gap-1">
                                    <div class="flex items-center">
                                        <a
                                            href="{{ $href }}"
                                            @if (($item['navigate'] ?? false) && $href !== '#') wire:navigate @endif
                                            @class([
                                                'group flex flex-1 cursor-pointer items-center gap-3.5 rounded-default !bg-transparent text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-purple/20',
                                                'text-secondary' => $active || $hasActiveChild,
                                                'text-secondary/65 hover:text-secondary' => ! ($active || $hasActiveChild),
                                            ])
                                            x-bind:class="collapsed ? 'justify-center px-0 py-1' : 'px-1 py-1'"
                                            @if ($active) aria-current="page" @endif
                                            x-on:click="if (window.matchMedia('(max-width: 767px)').matches && ! $event.target.closest('button')) { open = false }"
                                            title="{{ $label }}"
                                        >
                                            <span class="inline-flex aspect-square h-14 min-h-14 w-14 min-w-14 shrink-0 items-center justify-center">
                                                <span
                                                    @class([
                                                        'relative inline-flex aspect-square h-14 min-h-14 w-14 min-w-14 items-center justify-center rounded-full transition',
                                                        'bg-light text-purple' => $active || $hasActiveChild,
                                                        'text-secondary/45 group-hover:bg-light group-hover:text-purple' => ! ($active || $hasActiveChild),
                                                    ])
                                                    @if ($activeIconStyle) style="{{ $activeIconStyle }}" @endif
                                                >
                                                    <i class="bi bi-{{ $icon }} text-[1.35rem] leading-none" aria-hidden="true"></i>
                                                    @if ($badge)
                                                        <span class="absolute right-1 top-1 h-2.5 w-2.5 rounded-full bg-{{ $badgeVariant }}" x-show="collapsed" x-cloak></span>
                                                    @endif
                                                </span>
                                            </span>

                                            <span
                                                @class([
                                                    'truncate flex-1',
                                                    'group-hover:text-secondary' => ! $active,
                                                ])
                                                x-bind:class="collapsed ? 'md:hidden' : ''"
                                            >
                                                {{ $label }}
                                            </span>
                                        </a>

                                        <button
                                            type="button"
                                            class="inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg text-secondary/45 transition hover:bg-light hover:text-secondary focus:outline-none"
                                            x-bind:class="collapsed ? 'hidden' : ''"
                                            x-on:click.stop="expanded = ! expanded"
                                            aria-label="Alternar submenu"
                                        >
                                            <i class="bi bi-chevron-down text-xs transition-transform duration-200" x-bind:class="expanded ? 'rotate-180' : ''"></i>
                                        </button>
                                    </div>

                                    <div
                                        x-show="expanded && ! collapsed"
                                        x-cloak
                                        x-transition.opacity.duration.200ms
                                        class="ml-14 flex flex-col gap-1 border-l-2 border-border/80 pl-3 pt-0.5"
                                    >
                                        @foreach ($children as $child)
                                            @php
                                                $childActive = (bool) ($child['active'] ?? false);
                                                $childHref = $child['href'] ?? '#';
                                                $childLabel = $child['label'] ?? 'Subitem';
                                            @endphp
                                            <a
                                                href="{{ $childHref }}"
                                                @if (($child['navigate'] ?? false) && $childHref !== '#') wire:navigate @endif
                                                @class([
                                                    'block rounded-lg px-2 py-1.5 text-sm font-medium transition',
                                                    'font-semibold text-purple bg-purple/10' => $childActive,
                                                    'text-secondary/65 hover:bg-light hover:text-secondary' => ! $childActive,
                                                ])
                                                @if ($childActive) aria-current="page" @endif
                                                x-on:click="if (window.matchMedia('(max-width: 767px)').matches) { open = false }"
                                            >
                                                {{ $childLabel }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <a
                                    href="{{ $href }}"
                                    @if (($item['navigate'] ?? false) && $href !== '#') wire:navigate @endif
                                    @class([
                                        'group flex cursor-pointer items-center gap-3.5 rounded-default !bg-transparent text-base font-medium transition focus:outline-none focus:ring-2 focus:ring-purple/20',
                                        'text-secondary' => $active,
                                        'text-secondary/65 hover:text-secondary' => ! $active,
                                    ])
                                    x-bind:class="collapsed ? 'justify-center px-0 py-1' : 'px-1 py-1'"
                                    @if ($active) aria-current="page" @endif
                                    x-on:click="open = false"
                                    title="{{ $label }}"
                                >
                                    <span class="inline-flex aspect-square h-14 min-h-14 w-14 min-w-14 shrink-0 items-center justify-center">
                                        <span
                                            @class([
                                                'relative inline-flex aspect-square h-14 min-h-14 w-14 min-w-14 items-center justify-center rounded-full transition',
                                                'bg-light text-purple' => $active,
                                                'text-secondary/45 group-hover:bg-light group-hover:text-purple' => ! $active,
                                            ])
                                            @if ($activeIconStyle) style="{{ $activeIconStyle }}" @endif
                                        >
                                            <i class="bi bi-{{ $icon }} text-[1.35rem] leading-none" aria-hidden="true"></i>
                                            @if ($badge)
                                                <span class="absolute right-1 top-1 h-2.5 w-2.5 rounded-full bg-{{ $badgeVariant }}" x-show="collapsed" x-cloak></span>
                                            @endif
                                        </span>
                                    </span>

                                    <span
                                        @class([
                                            'truncate flex-1',
                                            'group-hover:text-secondary' => ! $active,
                                        ])
                                        x-bind:class="collapsed ? 'md:hidden' : ''"
                                    >
                                        {{ $label }}
                                    </span>

                                    @if ($badge)
                                        <span x-bind:class="collapsed ? 'md:hidden' : ''" class="shrink-0">
                                            <x-sampaui::badge :variant="$badgeVariant" :appearance="$badgeAppearance" size="xs">
                                                {{ $badge }}
                                            </x-sampaui::badge>
                                        </span>
                                    @endif
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach

            @if ($slot->isNotEmpty())
                <div class="pt-2">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </nav>

    @if ($logoutHref || isset($footer))
        <div class="shrink-0 pb-10 pt-4" x-bind:class="collapsed ? 'px-0' : 'px-8'">
            @isset($footer)
                {{ $footer }}
            @else
                <a
                    href="{{ $logoutHref }}"
                    class="group flex w-full cursor-pointer items-center gap-3.5 rounded-default border border-danger bg-transparent text-base font-medium text-danger shadow-none transition hover:bg-danger/10 hover:text-danger focus:outline-none focus:ring-2 focus:ring-danger/20"
                    x-bind:class="collapsed ? 'justify-center px-0 py-2' : 'px-3 py-2.5'"
                >
                    <span class="inline-flex h-14 w-14 shrink-0 items-center justify-center rounded-full transition">
                        <i class="bi bi-box-arrow-right text-[1.35rem] leading-none" aria-hidden="true"></i>
                    </span>
                    <span class="truncate" x-bind:class="collapsed ? 'md:hidden' : ''">{{ $logoutLabel }}</span>
                </a>
            @endisset
        </div>
    @endif
</aside>

