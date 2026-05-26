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
            'block w-full rounded-default border border-light bg-white px-4 py-2.5 text-base text-secondary transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
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
            'flex w-full cursor-pointer items-center justify-between gap-3 rounded-default border border-light bg-white px-4 py-2.5 text-left text-base text-secondary transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20',
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
            'light' => 'accent-light text-secondary focus:ring-light/40',
        ];

        return $colors[$color] ?? $colors['primary'];
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
