# Error

The `error` component provides an easy way to work with Laravel's `$error` message bag in its Blade views. You can use it to display (multiple) error messages for form fields.


## Basic Usage

Imagine we have the following validation errors:

```php
['first_name' => 'Incorrect first name.']
```

The most basic usage of the `error` component is as a self-closing component with a `field` attribute:

```html
<x-error field="first_name" class="text-red-500" />
```

This will output the following HTML:

```html
<div class="text-red-500">
    Incorrect first name.
</div>
```

As you can see it'll pick the error message from the `$error` message bag and render it in the view. If the message isn't set, the HTML isn't rendered.

## Composing The Content

You can also opt to customize the structure of the rendered content. This allows you to make use of the component's `messages()` method to, for example, render multiple validation errors at the same time.

Let's assume we have the following validation errors:

```php
[
    'first_name' => [
        'Incorrect first name.',
        'Needs at least 5 characters.',
    ]
]
```

Now we'll use the component's slot and its `messages()` method to render an unorderd list of the errors:

```html
<x-error field="first_name">
    <ul>
        @foreach ($component->messages($errors) as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</x-error>
```

This will output the following HTML:

```html
<div>
    <ul>
        <li>Incorrect first name.</li>
        <li>Needs at least 5 characters.</li>
    </ul>
</div>
```

As you can see we need to pass in the `$errors` message bag to the `messages()` method of the component to grab all the messages for our field. Then we loop over them and render them.
