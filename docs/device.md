# Device

Easily hide or show content depending on the user's device.

## Basic Usage

For example, show content only on desktop:

```html
<x-device desktop="true">
    <h1>Hello Word</h1>
</x-device>
```

If you need to display content for multiple devices, you can list them:

```html
<x-device phone="true" tablet="true">
    <h1>Hello Word</h1>
</x-device>
```

Enable for all devices:

```html
<x-device desktop="true" phone="true" tablet="true" robot="true" other="true">
    <h1>Hello Word</h1>
</x-device>
```
