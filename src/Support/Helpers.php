<?php

if (! function_exists('sampaui_asset')) {
    function sampaui_asset(string $path = 'sampaui.css'): string
    {
        return asset('vendor/sampaui/'.ltrim($path, '/'));
    }
}

if (! function_exists('sampaui_id')) {
    function sampaui_id(mixed $attributes, ?string $name, string $prefix): string
    {
        if ($attributes->get('id')) {
            return (string) $attributes->get('id');
        }

        if ($name) {
            $id = trim((string) preg_replace('/[^A-Za-z0-9\-_:.]+/', '-', $name), '-');

            if ($id !== '') {
                return $id;
            }
        }

        return $prefix.'-'.uniqid();
    }
}

if (! function_exists('sampaui_error')) {
    function sampaui_error(?string $name, ?string $error, mixed $errors = null): ?string
    {
        if ($error) {
            return $error;
        }

        if (! $name || ! $errors || ! method_exists($errors, 'has') || ! $errors->has($name)) {
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

if (! function_exists('sampaui_field_classes')) {
    /**
     * Base visual para inputs nativos e campos de formulario.
     *
     * @param  array<int|string, string|bool|null>  $classes
     */
    function sampaui_field_classes(?string $errorMessage = null, bool $disabled = false, array $classes = []): string
    {
        return sampaui_classes(array_merge([
            'block w-full rounded-default border border-secondary/40 bg-white px-4 py-2.5 text-base text-secondary transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
            'border-danger ring-2 ring-danger/20' => filled($errorMessage),
            'cursor-not-allowed opacity-50' => $disabled,
        ], $classes));
    }
}

if (! function_exists('sampaui_trigger_classes')) {
    /**
     * Base visual para campos acionados por botao, como combobox e date picker.
     *
     * @param  array<int|string, string|bool|null>  $classes
     */
    function sampaui_trigger_classes(?string $errorMessage = null, bool $disabled = false, array $classes = []): string
    {
        return sampaui_classes(array_merge([
            'flex w-full cursor-pointer items-center justify-between gap-3 rounded-default border border-secondary/40 bg-white px-4 py-2.5 text-left text-base text-secondary transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
            'border-danger ring-2 ring-danger/20' => filled($errorMessage),
            'cursor-not-allowed opacity-50' => $disabled,
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
            'primary' => 'peer-checked:border-primary peer-checked:bg-primary peer-focus:ring-primary/20',
            'secondary' => 'peer-checked:border-secondary peer-checked:bg-secondary peer-focus:ring-secondary/20',
            'accent' => 'peer-checked:border-accent peer-checked:bg-accent peer-focus:ring-accent/20',
            'danger' => 'peer-checked:border-danger peer-checked:bg-danger peer-focus:ring-danger/20',
            'success' => 'peer-checked:border-success peer-checked:bg-success peer-focus:ring-success/20',
            'warning' => 'peer-checked:border-warning peer-checked:bg-warning peer-focus:ring-warning/20',
            'info' => 'peer-checked:border-info peer-checked:bg-info peer-focus:ring-info/20',
            'purple' => 'peer-checked:border-purple peer-checked:bg-purple peer-focus:ring-purple/20',
            'muted' => 'peer-checked:border-muted peer-checked:bg-muted peer-focus:ring-muted/30',
            'light' => 'peer-checked:border-light peer-checked:bg-light peer-focus:ring-light/40',
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
            'light' => 'border-light bg-light text-secondary',
        ];

        return $variants[$variant] ?? $variants['primary'];
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
            'default' => 'border-light bg-white text-secondary',
            'muted' => 'border-light bg-light text-secondary',
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
