<form method="POST" action="{{ $action }}" id="{{ $formId }}">
    @csrf
</form>

<button form="{{ $formId }}" type="submit" {{ $attributes }}>
    {{ $slot->isEmpty() ? __('Log out') : $slot }}
</button>
