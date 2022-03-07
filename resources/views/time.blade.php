<time datetime="{{ $date->toISOString() }}" {{ $attributes }}>
    {{ $human ? $date->diffForHumans() : $date->format($format) }}
</time>
