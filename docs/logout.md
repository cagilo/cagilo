# Logout

The `logout` component is a small convenience component for a widely used concept in an app, the logout link. Often this
action sits in a menu item with other hyperlinks. But a logout is meant as an actionable link rather than a `GET`
request. Therefor a `POST` request is better suited. And thus it deserves its own component.

## Basic Usage

The most basic usage of the component is as a self-closed tag:

```html
<x-logout class="text-gray-500"/>
```

This will output the following HTML:

```html
<form method="POST" action="http://localhost/logout">
  <input type="hidden" name="_token" value="...">

  <button type="submit" class="text-gray-500">
    Log out
  </button>
</form>
```

As you can see, the component renders a form to a logout route. It makes use of the named `logout` route of your app by
default so make sure you've defined this in your app:

```php
Route::post('/logout', 'AuthController@logout');
```

You might also notice it automatically sets the button label. Behind the scenes the component also uses the `__()`
translation helper so you can easily translate the label.

## Customizing

Adjusting either the route or button label can be done by setting the `action` attribute and the slot:

```html
<x-logout :action="route('custom-logout')" class="text-gray-500">
  Sign Out
</x-logout>
```

This will output the following HTML:

```html
<form method="POST" action="http://localhost/custom-logout">
  <input type="hidden" name="_token" value="...">

  <button type="submit" class="text-gray-500">
    Sign Out
  </button>
</form>
```

> Note that when using the slot, the `__()` translation helper isn't applied anymore. This gives you full control over the slotted content should you want to for example, incorporate an icon.
