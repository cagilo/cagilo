<div role="alert" {{ $attributes }}>
    {{ $slot->isEmpty() ? $message() : $slot }}
</div>
