# Responsive

Easily hide or show content depending on the user's device.

## Installation

You can install the package via composer:

```php
$ composer require blade-components/responsive
```

## Usage

For example, show content only on desktop:

```blade
<x-device desktop="true">
    <h1>Hello Word</h1>
</x-device>
```

If you need to display content for multiple devices, you can list them:

```blade
<x-device phone="true" tablet="true">
    <h1>Hello Word</h1>
</x-device>
```

Enable for all devices:

```blade
<x-device desktop="true" phone="true" tablet="true" robot="true" other="true">
    <h1>Hello Word</h1>
</x-device>
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
