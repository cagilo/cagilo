# Alert

The `alert` component provides an easy integration with [Laravel's session flashing](https://laravel.com/docs/session#flash-data). By flashing messages to session from the backend, the alert component picks them up and displays them in your Blade views. You can combine multiple types of messages, display multiple messages at once and compose styling per alert type.

## Displaying Alerts

The most basic usage of the `alert` component is to first flash a message to the `alert` key:

```php
session()->flash('alert', 'Settings saved successfully.');
```

And then, use the component to display it in your Blade view:

```html
<x-alert class="bg-green-700 text-green-100 p-4" />
```

This will output the following HTML:

```html
<div role="alert" class="bg-green-700 text-green-100 p-4">
    Settings saved successfully.
</div>
```

## Using Multiple Types

You can also flash different types of messages using specific session keys. Let's flash some messages to the session:

```php
session()->flash('success', 'Settings saved successfully.');
session()->flash('warning', 'Please confirm your email address.');
session()->flash('danger', 'Passwords do not match.');
```

Reference the different types using the `type` attribute on the `alert` component:

```html
<x-alert type="success" class="bg-green-700 text-green-100 p-4" />
<x-alert type="warning" class="bg-yellow-700 text-yellow-100 p-4" />
<x-alert type="danger" class="bg-red-700 text-red-100 p-4" />
```

These will then render all of the flashed messages.

## Composing The Content

If you'd like to compose how the content is rendered within the component you can make use of its slot. This is useful, for example, for adding functionality like icons or dismiss elements. You can control the position of where the message will be placed by using the component's `message` method:

```html
<x-alert class="bg-green-700 text-green-100 p-4">
    <x-heroicon-o-check-circle class="h-5 w-5" />
    {{ $component->message() }}
</x-alert>
```

This will output the following HTML:

```html
<div role="alert" class="bg-green-700 text-green-100 p-4">
    <svg class="h-5 w-5" ...>...</svg>
    Settings saved successfully.
</div>
```

## Displaying Multiple Messages

You can also opt to display multiple flashed messages for a specific alert type. Let's flash some messages to the session first:

```php
session()->flash('danger', [
    'Biography is too long.',
    'Passwords do not match.',
]);
```

We can then make use of the component's slot to render a list of messages. The `messages` method gives us access to all the messages from a specific type:

```html
<x-alert type="danger" class="bg-red-700 text-red-100 p-4">
    <ul>
        @foreach ($component->messages() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
</x-alert>
```

You can still choose to just display a single message from a list of messages by using a non-slotted component:

```html
<x-alert type="danger" class="bg-red-700 text-red-100 p-4" />
```

By default, using this approach will display the first message from a specific alert type.

## Composing Multiple Types

When you use multiple types of messages but still want to compose the look and feel of the content you can do so. Using the code snippet from below we can differentiate the content based on an alert's `$type`:

```html
@foreach (['success', 'warning', 'danger'] as $type)
    <x-alert :type="$type" class="text-sm leading-5">
        @if ($type === 'warning')
            <div class="bg-yellow-700 text-yellow-100 p-4">
                <x-heroicon-o-exclamation-circle class="h-5 w-5" />
                {{ $component->message() }}
            </div>
        @elseif ($type === 'danger')
            <div class="bg-red-700 text-red-100 p-4">
                <x-heroicon-o-x-circle class="h-5 w-5" />
                {{ $component->message() }}
            </div>
        @else
            <div class="bg-green-700 text-green-100 p-4">
                <x-heroicon-o-check-circle class="h-5 w-5" />
                {{ $component->message() }}
            </div>
        @endif
    </x-alert>
@endforeach
```
