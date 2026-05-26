@props(['items' => []])

<nav {{ $attributes->merge(['class' => 'flex items-center gap-2 text-sm text-secondary']) }} aria-label="Breadcrumb">
    <ol class="flex flex-wrap items-center gap-2">
        @foreach ($items as $item)
            @php($isLast = $loop->last)
            <li class="flex items-center gap-2">
                @if (! $isLast && ! empty($item['href']))
                    <a href="{{ $item['href'] }}" class="font-medium transition hover:text-primary">{{ $item['label'] ?? $item }}</a>
                @else
                    <span @if ($isLast) aria-current="page" @endif class="{{ $isLast ? 'font-medium text-primary' : '' }}">{{ $item['label'] ?? $item }}</span>
                @endif
                @if (! $isLast)
                    <i class="bi bi-chevron-right text-xs text-secondary/40" aria-hidden="true"></i>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
