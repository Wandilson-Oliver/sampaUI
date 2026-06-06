@props([
    'label' => null,
    'hint' => null,
    'name' => null,
    'value' => '',
    'length' => 4,
    'prefix' => null,
    'clear' => false,
    'numbers' => false,
    'letters' => false,
    'smart' => false,
    'error' => null,
    'disabled' => false,
    'required' => false,
])

@php
    $id = sampaui_id($attributes, $name, 'sampaui-pin');
    $errorMessage = sampaui_error($name, $error, $errors ?? null);
    $pinLength = max(1, (int) $length);
    $initialValue = substr((string) old($name, $value), 0, $pinLength);
    $inputMode = $numbers ? 'numeric' : 'text';
    $pattern = $numbers ? '[0-9]*' : ($letters ? '[A-Za-z]*' : '[A-Za-z0-9]*');
    $rootAttributes = $attributes->filter(
        fn (mixed $attributeValue, string $attributeName): bool => str_starts_with($attributeName, 'wire:model')
            || $attributeName === 'x-model'
            || str_starts_with($attributeName, 'x-on:')
    );
    $inputAttributes = $attributes
        ->whereDoesntStartWith('wire:model')
        ->whereDoesntStartWith('x-model')
        ->whereDoesntStartWith('x-on:')
        ->except(['id', 'class']);
@endphp

<div
    {{ $rootAttributes }}
    x-data="{
        value: @js($initialValue),
        digits: Array(@js($pinLength)).fill(''),
        submitted: false,
        init() {
            this.setDigitsFromValue(this.value);

            this.$watch('value', nextValue => {
                const normalized = this.normalize(nextValue);

                if (normalized !== this.currentValue()) {
                    this.setDigitsFromValue(normalized);
                }
            });
        },
        normalize(input) {
            const raw = String(input || '');
            const filtered = raw
                .split('')
                .filter(char => {
                    if (@js($numbers)) return /[0-9]/.test(char);
                    if (@js($letters)) return /[A-Za-z]/.test(char);

                    return /[A-Za-z0-9]/.test(char);
                })
                .join('');

            return filtered.slice(0, @js($pinLength));
        },
        setDigitsFromValue(input) {
            const normalized = this.normalize(input);
            const nextDigits = Array(@js($pinLength)).fill('');

            normalized.split('').forEach((char, index) => nextDigits[index] = char);
            this.digits = nextDigits;
            this.value = normalized;
            this.submitted = false;
        },
        currentValue() {
            return this.digits.join('');
        },
        sync(action = null) {
            this.value = this.currentValue();

            this.$nextTick(() => {
                this.$refs.input?.dispatchEvent(new Event('input', { bubbles: true }));
                this.$refs.input?.dispatchEvent(new Event('change', { bubbles: true }));
            });

            if (this.value.length < @js($pinLength)) {
                this.submitted = false;
            }

            if (this.value.length === @js($pinLength)) {
                this.$dispatch('filled', { model: this.value });

                if (@js($smart) && ! this.submitted) {
                    this.submitted = true;
                    this.$nextTick(() => this.$root.closest('form')?.requestSubmit());
                }
            }

            if (action === 'clear') {
                this.$dispatch('clear', { model: this.value });
            }
        },
        fillFrom(index, input) {
            const chars = this.normalize(input).split('');

            if (chars.length === 0) {
                this.digits[index] = '';
                this.sync();
                return;
            }

            chars.forEach((char, offset) => {
                const target = index + offset;
                if (target < @js($pinLength)) this.digits[target] = char;
            });

            this.sync();
            this.focus(Math.min(index + chars.length, @js($pinLength) - 1));
        },
        handleInput(index, event) {
            this.fillFrom(index, event.target.value);
            event.target.value = this.digits[index] || '';
        },
        handlePaste(index, event) {
            event.preventDefault();
            this.fillFrom(index, event.clipboardData?.getData('text') || '');
        },
        handleKeydown(index, event) {
            if (event.key === 'Backspace' && ! this.digits[index] && index > 0) {
                this.digits[index - 1] = '';
                this.sync();
                this.focus(index - 1);
            }

            if (event.key === 'ArrowLeft' && index > 0) {
                event.preventDefault();
                this.focus(index - 1);
            }

            if (event.key === 'ArrowRight' && index < @js($pinLength) - 1) {
                event.preventDefault();
                this.focus(index + 1);
            }
        },
        focus(index) {
            this.$refs[`digit${index}`]?.focus();
            this.$refs[`digit${index}`]?.select();
        },
        clearPin() {
            this.digits = Array(@js($pinLength)).fill('');
            this.value = '';
            this.submitted = false;
            this.sync('clear');
            this.focus(0);
        },
    }"
    x-modelable="value"
>
    @if ($label)
        <label id="{{ $id }}-label" class="mb-2 block text-sm font-medium text-secondary">
            {{ $label }}
            @if ($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    @if ($hint)
        <p id="{{ $id }}-hint" class="mb-3 text-sm text-secondary/70">{{ $hint }}</p>
    @endif

    <input
        x-ref="input"
        type="hidden"
        id="{{ $id }}"
        @if ($name) name="{{ $name }}" @endif
        x-bind:value="value"
        @if ($required) required @endif
        @disabled($disabled)
        {{ $inputAttributes }}
    >

    <div
        class="flex flex-wrap items-center gap-2"
        role="group"
        @if ($label) aria-labelledby="{{ $id }}-label" @endif
        @if ($hint || $errorMessage) aria-describedby="{{ collect([$hint ? $id.'-hint' : null, $errorMessage ? $id.'-error' : null])->filter()->implode(' ') }}" @endif
    >
        @if ($prefix)
            <span class="inline-flex h-12 shrink-0 items-center rounded-default border border-light bg-light px-3 text-base font-semibold text-secondary">
                {{ $prefix }}
            </span>
        @endif

        @for ($index = 0; $index < $pinLength; $index++)
            <input
                x-ref="digit{{ $index }}"
                type="text"
                inputmode="{{ $inputMode }}"
                pattern="{{ $pattern }}"
                maxlength="1"
                autocomplete="{{ $index === 0 ? 'one-time-code' : 'off' }}"
                class="{{ sampaui_classes([
                    'h-12 w-11 rounded-default border border-secondary/40 bg-white text-center text-lg font-semibold text-secondary transition placeholder:text-secondary/50 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 sm:w-12',
                    'border-danger ring-2 ring-danger/20' => filled($errorMessage),
                    'cursor-not-allowed opacity-50' => $disabled,
                    $attributes->get('class'),
                ]) }}"
                x-bind:value="digits[{{ $index }}]"
                x-on:input="handleInput({{ $index }}, $event)"
                x-on:paste="handlePaste({{ $index }}, $event)"
                x-on:keydown="handleKeydown({{ $index }}, $event)"
                aria-label="Digito {{ $index + 1 }} de {{ $pinLength }}"
                @if ($errorMessage) aria-invalid="true" @endif
                @disabled($disabled)
            >
        @endfor

        @if ($clear)
            <button
                type="button"
                class="inline-flex h-10 w-10 cursor-pointer items-center justify-center rounded-full text-secondary transition hover:bg-light hover:text-danger focus:outline-none focus:ring-2 focus:ring-danger/20 disabled:cursor-not-allowed disabled:opacity-50"
                x-show="value.length > 0"
                x-cloak
                x-on:click="clearPin()"
                aria-label="Limpar PIN"
                @disabled($disabled)
            >
                <i class="bi bi-x-lg text-sm" aria-hidden="true"></i>
            </button>
        @endif
    </div>

    @if ($errorMessage)
        <p id="{{ $id }}-error" class="mt-2 text-sm text-danger">{{ $errorMessage }}</p>
    @endif
</div>
