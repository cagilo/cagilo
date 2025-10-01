<form method="POST" action="{{ $action }}" id="{{ $formId }}">
    @if($method)
        @method($method)
    @endif
    @csrf
</form>

<button form="{{ $formId }}" type="submit" {{ $attributes }}>
    {{ $slot->isEmpty() ? __('Submit') : $slot }}
</button>
