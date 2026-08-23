<?php

if (! function_exists('sampaui_asset')) {
    function sampaui_asset(string $path = 'sampaui.css'): string
    {
        return asset('vendor/sampaui/'.ltrim($path, '/'));
    }
}

if (! function_exists('sampaui_id')) {
    function sampaui_id(mixed $attributes, ?string $name, string $prefix, mixed $value = null): string
    {
        if ($attributes->get('id')) {
            return (string) $attributes->get('id');
        }

        $fieldName = sampaui_field_name($attributes, $name);

        if ($fieldName) {
            $parts = [$fieldName];

            if (is_scalar($value) || $value instanceof Stringable) {
                $parts[] = (string) $value;
            }

            $id = trim((string) preg_replace('/[^A-Za-z0-9\-_:.]+/', '-', implode('-', $parts)), '-');

            if ($id !== '') {
                return $id;
            }
        }

        return $prefix.'-'.uniqid();
    }
}

if (! function_exists('sampaui_field_name')) {
    function sampaui_field_name(mixed $attributes, ?string $name): ?string
    {
        if (filled($name)) {
            return $name;
        }

        foreach ($attributes->getAttributes() as $attribute => $value) {
            if (($attribute === 'wire:model' || str_starts_with($attribute, 'wire:model.')) && filled($value)) {
                return (string) $value;
            }
        }

        return null;
    }
}

if (! function_exists('sampaui_error')) {
    function sampaui_error(?string $name, ?string $error, mixed $errors = null): ?string
    {
        if ($error) {
            return $error;
        }

        if (! $name || ! $errors || ! is_callable([$errors, 'has']) || ! $errors->has($name)) {
            return null;
        }

        return $errors->first($name);
    }
}

if (! function_exists('sampaui_classes')) {
    /**
     * @param  array<int|string, string|bool|null>  $classes
     */
    function sampaui_classes(array $classes): string
    {
        return collect($classes)
            ->map(function (string|bool|null $value, int|string $key): ?string {
                if (is_string($key)) {
                    return $value ? $key : null;
                }

                return is_string($value) && $value !== '' ? $value : null;
            })
            ->filter()
            ->implode(' ');
    }
}

if (! function_exists('sampaui_cn')) {
    /**
     * Helper universal estilo cn() para mesclagem inteligente e resolução de conflitos Tailwind.
     */
    function sampaui_cn(...$classes): string
    {
        return \SampaUI\Support\ClassNames::merge(...$classes);
    }
}

if (! function_exists('sampaui_tailwind_class_group')) {
    /**
     * Identifica grupos de utilitarios Tailwind que ocupam a mesma propriedade visual.
     *
     * @return array{0: string, 1: string}|null
     */
    function sampaui_tailwind_class_group(string $class): ?array
    {
        $class = ltrim($class, '!');

        if ($class === '' || str_contains($class, '[')) {
            return null;
        }

        $separator = strrpos($class, ':');
        $variant = $separator === false ? '' : substr($class, 0, $separator);
        $utility = $separator === false ? $class : substr($class, $separator + 1);
        $utility = ltrim($utility, '-');

        $group = match (true) {
            str_starts_with($utility, 'bg-') => 'background',
            preg_match('/^text-(xs|sm|base|lg|xl|[2-9]xl)$/', $utility) === 1 => 'text-size',
            in_array($utility, ['text-left', 'text-center', 'text-right', 'text-justify', 'text-start', 'text-end'], true) => 'text-align',
            str_starts_with($utility, 'text-') => 'text-color',
            $utility === 'border' || preg_match('/^border(?:-[trblxy])?-(0|2|4|8)$/', $utility) === 1 => 'border-width',
            str_starts_with($utility, 'border-') => 'border-color',
            str_starts_with($utility, 'rounded') => 'rounded',
            preg_match('/^p([trblxy]?)-/', $utility, $matches) === 1 => 'padding-'.($matches[1] === '' ? 'all' : $matches[1]),
            preg_match('/^m([trblxy]?)-/', $utility, $matches) === 1 => 'margin-'.($matches[1] === '' ? 'all' : $matches[1]),
            preg_match('/^w-/', $utility) === 1 => 'width',
            preg_match('/^h-/', $utility) === 1 => 'height',
            str_starts_with($utility, 'gap-') => 'gap',
            str_starts_with($utility, 'font-') => 'font-weight',
            str_starts_with($utility, 'shadow') => 'shadow',
            str_starts_with($utility, 'opacity-') => 'opacity',
            str_starts_with($utility, 'cursor-') => 'cursor',
            str_starts_with($utility, 'justify-') => 'justify',
            str_starts_with($utility, 'items-') => 'items',
            in_array($utility, ['inline-flex', 'flex', 'inline-block', 'block', 'hidden'], true) => 'display',
            $utility === 'ring' || preg_match('/^ring-(0|1|2|4|8)$/', $utility) === 1 => 'ring-width',
            str_starts_with($utility, 'ring-') => 'ring-color',
            default => null,
        };

        return $group ? [$variant, $group] : null;
    }
}

if (! function_exists('sampaui_merge_tailwind_classes')) {
    /**
     * Mantem os defaults do SampaUI sem competir com utilitarios informados pelo consumidor.
     */
    function sampaui_merge_tailwind_classes(string $defaults, ?string $customClasses = null): string
    {
        $custom = preg_split('/\s+/', trim((string) $customClasses)) ?: [];

        if ($custom === []) {
            return trim($defaults);
        }

        $groups = [];

        foreach ($custom as $class) {
            $group = sampaui_tailwind_class_group($class);

            if ($group) {
                $groups[$group[0].'|'.$group[1]] = true;
            }
        }

        $baseColorOverrides = [
            'background' => isset($groups['|background']),
            'text-color' => isset($groups['|text-color']),
        ];

        $defaults = preg_split('/\s+/', trim($defaults)) ?: [];

        $filteredDefaults = array_filter($defaults, function (string $class) use ($groups, $baseColorOverrides): bool {
            $group = sampaui_tailwind_class_group($class);

            if (! $group) {
                return true;
            }

            [$variant, $family] = $group;

            if (isset($groups[$variant.'|'.$family])) {
                return false;
            }

            if ($variant === 'hover' && ($family === 'background' || $family === 'text-color') && $baseColorOverrides[$family]) {
                return false;
            }

            if ($family !== 'padding-all' && isset($groups[$variant.'|padding-all'])) {
                return false;
            }

            if ($family !== 'margin-all' && isset($groups[$variant.'|margin-all'])) {
                return false;
            }

            return true;
        });

        return implode(' ', [...$filteredDefaults, ...$custom]);
    }
}

if (! function_exists('sampaui_described_by')) {
    function sampaui_described_by(string $id, ?string $hint = null, ?string $error = null, ?string $existing = null): ?string
    {
        $ids = collect([
            $existing,
            filled($hint) ? $id.'-hint' : null,
            filled($error) ? $id.'-error' : null,
        ])->filter()->flatMap(fn (string $value): array => preg_split('/\s+/', trim($value)) ?: [])->unique()->values();

        return $ids->isEmpty() ? null : $ids->implode(' ');
    }
}

if (! function_exists('sampaui_field_classes')) {
    /**
     * Base visual para inputs nativos e campos de formulario.
     *
     * @param  array<int|string, string|bool|null>  $classes
     */
    function sampaui_field_classes(
        ?string $errorMessage = null,
        bool $disabled = false,
        array $classes = [],
        ?string $state = null,
        bool $readonly = false,
        bool $loading = false,
    ): string {
        $normalizedState = filled($errorMessage) ? 'error' : ($state ?? 'default');

        $states = [
            'default' => null,
            'error' => 'border-danger ring-2 ring-danger/20',
            'success' => 'border-success focus:border-success focus:ring-success/20',
            'warning' => 'border-warning focus:border-warning focus:ring-warning/20',
        ];

        $hasCustomPaddingX = false;
        foreach ($classes as $key => $val) {
            $candidate = is_string($key) ? $key : (is_string($val) ? $val : '');
            if (str_contains($candidate, 'pl-') || str_contains($candidate, 'pr-') || str_contains($candidate, 'px-')) {
                $hasCustomPaddingX = true;
                break;
            }
        }

        return sampaui_classes(array_merge([
            'block w-full rounded-default border border-secondary/20 bg-white py-2.5 text-base text-secondary transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
            'px-4' => ! $hasCustomPaddingX,
            $states[$normalizedState] ?? $states['default'],
            'cursor-not-allowed opacity-50' => $disabled || $loading,
            'bg-light/40 text-secondary/80' => $readonly,
        ], $classes));
    }
}

if (! function_exists('sampaui_trigger_classes')) {
    /**
     * Base visual para campos acionados por botao, como combobox e date picker.
     *
     * @param  array<int|string, string|bool|null>  $classes
     */
    function sampaui_trigger_classes(
        ?string $errorMessage = null,
        bool $disabled = false,
        array $classes = [],
        ?string $state = null,
        bool $loading = false,
    ): string {
        $normalizedState = filled($errorMessage) ? 'error' : ($state ?? 'default');
        $states = [
            'default' => null,
            'error' => 'border-danger ring-2 ring-danger/20',
            'success' => 'border-success focus:border-success focus:ring-success/20',
            'warning' => 'border-warning focus:border-warning focus:ring-warning/20',
        ];

        return sampaui_classes(array_merge([
            'flex min-h-12 w-full cursor-pointer items-center justify-between gap-3 rounded-default border border-secondary/20 bg-white px-4 py-2.5 text-left text-base text-secondary transition hover:border-secondary/30 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
            $states[$normalizedState] ?? $states['default'],
            'cursor-not-allowed opacity-50' => $disabled || $loading,
        ], $classes));
    }
}

if (! function_exists('sampaui_control_color_classes')) {
    function sampaui_control_color_classes(string $color = 'primary'): string
    {
        $colors = [
            'primary' => 'accent-primary text-primary focus:ring-primary/20',
            'secondary' => 'accent-secondary text-secondary focus:ring-secondary/20',
            'accent' => 'accent-accent text-accent focus:ring-accent/20',
            'danger' => 'accent-danger text-danger focus:ring-danger/20',
            'success' => 'accent-success text-success focus:ring-success/20',
            'warning' => 'accent-warning text-warning focus:ring-warning/20',
            'info' => 'accent-info text-info focus:ring-info/20',
            'purple' => 'accent-purple text-purple focus:ring-purple/20',
            'muted' => 'accent-muted text-secondary focus:ring-muted/30',
            'light' => 'accent-light text-secondary focus:ring-light/40',
        ];

        return $colors[$color] ?? $colors['primary'];
    }
}

if (! function_exists('sampaui_toggle_color_classes')) {
    function sampaui_toggle_color_classes(string $color = 'primary'): string
    {
        $colors = [
            'primary' => 'border-primary peer-checked:bg-primary peer-focus:ring-primary/20',
            'secondary' => 'border-secondary peer-checked:bg-secondary peer-focus:ring-secondary/20',
            'accent' => 'border-accent peer-checked:bg-accent peer-focus:ring-accent/20',
            'danger' => 'border-danger peer-checked:bg-danger peer-focus:ring-danger/20',
            'success' => 'border-success peer-checked:bg-success peer-focus:ring-success/20',
            'warning' => 'border-warning peer-checked:bg-warning peer-focus:ring-warning/20',
            'info' => 'border-info peer-checked:bg-info peer-focus:ring-info/20',
            'purple' => 'border-purple peer-checked:bg-purple peer-focus:ring-purple/20',
            'muted' => 'border-muted peer-checked:bg-muted peer-focus:ring-muted/30',
            'light' => 'border-border peer-checked:bg-light peer-focus:ring-light/40',
        ];

        return $colors[$color] ?? $colors['primary'];
    }
}

if (! function_exists('sampaui_toggle_knob_color_classes')) {
    function sampaui_toggle_knob_color_classes(string $color = 'primary'): string
    {
        $colors = [
            'primary' => 'bg-primary peer-checked:bg-white',
            'secondary' => 'bg-secondary peer-checked:bg-white',
            'accent' => 'bg-accent peer-checked:bg-white',
            'danger' => 'bg-danger peer-checked:bg-white',
            'success' => 'bg-success peer-checked:bg-white',
            'warning' => 'bg-warning peer-checked:bg-white',
            'info' => 'bg-info peer-checked:bg-white',
            'purple' => 'bg-purple peer-checked:bg-white',
            'muted' => 'bg-muted peer-checked:bg-white',
            'light' => 'bg-muted peer-checked:bg-secondary',
        ];

        return $colors[$color] ?? $colors['primary'];
    }
}

if (! function_exists('sampaui_button_variant_classes')) {
    function sampaui_button_variant_classes(string $variant = 'primary'): string
    {
        $variants = [
            'primary' => 'bg-primary text-white hover:bg-primary/90',
            'secondary' => 'bg-secondary text-white hover:bg-secondary/90',
            'accent' => 'bg-accent text-white hover:bg-accent/90',
            'danger' => 'bg-danger text-white hover:bg-danger/90',
            'success' => 'bg-success text-white hover:bg-success/90',
            'warning' => 'bg-warning text-white hover:bg-warning/90',
            'info' => 'bg-info text-white hover:bg-info/90',
            'purple' => 'bg-purple text-white hover:bg-purple/90',
            'muted' => 'bg-muted text-white hover:bg-muted/90',
            'light' => 'bg-light text-secondary hover:bg-light/80',
            'ghost' => 'bg-transparent text-secondary hover:bg-light/30',
            'outline' => 'bg-transparent border border-primary text-primary hover:bg-primary hover:text-white',
        ];

        return $variants[$variant] ?? $variants['primary'];
    }
}

if (! function_exists('sampaui_badge_variant_classes')) {
    function sampaui_badge_variant_classes(string $variant = 'primary'): string
    {
        $variants = [
            'primary' => 'border-primary/25 bg-primary/10 text-primary',
            'secondary' => 'border-secondary/40 bg-light text-secondary',
            'accent' => 'border-accent/30 bg-accent/10 text-accent',
            'danger' => 'border-danger/30 bg-danger/10 text-danger',
            'success' => 'border-success/30 bg-success/10 text-success',
            'warning' => 'border-warning/30 bg-warning/10 text-warning',
            'info' => 'border-info/30 bg-info/10 text-info',
            'purple' => 'border-purple/30 bg-purple/10 text-purple',
            'muted' => 'border-muted/30 bg-muted/10 text-secondary',
            'light' => 'border-border bg-light text-secondary',
        ];

        return $variants[$variant] ?? $variants['primary'];
    }
}

if (! function_exists('sampaui_badge_appearance_classes')) {
    function sampaui_badge_appearance_classes(string $variant = 'primary', string $appearance = 'soft'): string
    {
        $colors = [
            'primary' => ['border-primary/25', 'bg-primary/10 text-primary', 'bg-primary text-white', 'text-primary'],
            'secondary' => ['border-secondary/40', 'bg-secondary/10 text-secondary', 'bg-secondary text-white', 'text-secondary'],
            'accent' => ['border-accent/30', 'bg-accent/10 text-accent', 'bg-accent text-white', 'text-accent'],
            'danger' => ['border-danger/30', 'bg-danger/10 text-danger', 'bg-danger text-white', 'text-danger'],
            'success' => ['border-success/30', 'bg-success/10 text-success', 'bg-success text-white', 'text-success'],
            'warning' => ['border-warning/30', 'bg-warning/10 text-warning', 'bg-warning text-white', 'text-warning'],
            'info' => ['border-info/30', 'bg-info/10 text-info', 'bg-info text-white', 'text-info'],
            'purple' => ['border-purple/30', 'bg-purple/10 text-purple', 'bg-purple text-white', 'text-purple'],
            'muted' => ['border-muted/30', 'bg-muted/10 text-secondary', 'bg-muted text-white', 'text-secondary'],
            'light' => ['border-border', 'bg-light text-secondary', 'bg-light text-secondary', 'text-secondary'],
        ];
        $tone = $colors[$variant] ?? $colors['primary'];

        return match ($appearance) {
            'solid' => $tone[0].' '.$tone[2],
            'outline' => $tone[0].' bg-transparent '.$tone[3],
            default => $tone[0].' '.$tone[1],
        };
    }
}

if (! function_exists('sampaui_progress_variant_classes')) {
    function sampaui_progress_variant_classes(string $variant = 'primary'): string
    {
        $variants = [
            'primary' => 'bg-primary',
            'secondary' => 'bg-secondary',
            'accent' => 'bg-accent',
            'danger' => 'bg-danger',
            'success' => 'bg-success',
            'warning' => 'bg-warning',
            'info' => 'bg-info',
            'purple' => 'bg-purple',
            'muted' => 'bg-muted',
            'light' => 'bg-light',
        ];

        return $variants[$variant] ?? $variants['primary'];
    }
}

if (! function_exists('sampaui_surface_variant_classes')) {
    function sampaui_surface_variant_classes(string $variant = 'default'): string
    {
        $variants = [
            'default' => 'border-border bg-white text-secondary',
            'muted' => 'border-border bg-light text-secondary',
            'primary' => 'border-primary bg-white text-secondary',
            'secondary' => 'border-secondary bg-white text-secondary',
            'accent' => 'border-accent bg-white text-secondary',
            'danger' => 'border-danger bg-white text-secondary',
            'success' => 'border-success bg-white text-secondary',
            'warning' => 'border-warning bg-white text-secondary',
            'info' => 'border-info bg-white text-secondary',
            'purple' => 'border-purple bg-white text-secondary',
        ];

        return $variants[$variant] ?? $variants['default'];
    }
}

if (! function_exists('sampaui_alert_tone')) {
    /**
     * @return array{wrap: string, icon: string, defaultIcon: string, role: string}
     */
    function sampaui_alert_tone(string $tone = 'info'): array
    {
        $tones = [
            'success' => [
                'wrap' => 'border-success bg-success/10 text-secondary',
                'icon' => 'text-success',
                'defaultIcon' => 'check2-circle',
                'role' => 'status',
            ],
            'error' => [
                'wrap' => 'border-danger bg-danger/10 text-secondary',
                'icon' => 'text-danger',
                'defaultIcon' => 'exclamation-octagon',
                'role' => 'alert',
            ],
            'danger' => [
                'wrap' => 'border-danger bg-danger/10 text-secondary',
                'icon' => 'text-danger',
                'defaultIcon' => 'exclamation-octagon',
                'role' => 'alert',
            ],
            'warning' => [
                'wrap' => 'border-warning bg-warning/10 text-secondary',
                'icon' => 'text-warning',
                'defaultIcon' => 'exclamation-triangle',
                'role' => 'status',
            ],
            'info' => [
                'wrap' => 'border-info bg-info/10 text-secondary',
                'icon' => 'text-info',
                'defaultIcon' => 'info-circle',
                'role' => 'status',
            ],
        ];

        return $tones[$tone] ?? $tones['info'];
    }
}

if (! function_exists('sampaui_tone')) {
    /**
     * @param  array<string, string>  $map
     */
    function sampaui_tone(string $value, array $map, string $default): string
    {
        return $map[$value] ?? $map[$default] ?? '';
    }
}
