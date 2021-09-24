<x-submit action="{{ $action }}"  formId="{{$formId}}" {{ $attributes }}>
    {{ $slot->isEmpty() ? __('Log out') : $slot }}
</x-submit>
