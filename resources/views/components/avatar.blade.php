@props(['name', 'color' => null, 'size' => 72])

@php
    $words = collect(preg_split('/\s+/', trim($name)))->filter();
    $initials = strtoupper($words->map(fn ($w) => mb_substr($w, 0, 1))->take(2)->implode(''));
    $bg = $color ?? '#4f7cff';
    $fontSize = $size * 0.36;
@endphp

<div class="avatar-circle" style="--avatar-bg: {{ $bg }}; width: {{ $size }}px; height: {{ $size }}px; font-size: {{ $fontSize }}px;">
    {{ $initials }}
</div>
