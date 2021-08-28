@error($field, $bag)
    <div {{ $attributes }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </div>
@enderror
