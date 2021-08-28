# Social Meta

The `social-meta` component allows you to set several `og` and `meta` elements used by social media to provide previews of your website when sharing it.


## Basic Usage

The most basic usage of the component requires setting three attributes, `title`, `description`, and `image`:

```html
<x-social-meta
    title="Hello World"
    description="Blade components are awesome!"
    image="http://example.com/social.jpg"
/>
```

This will output the following HTML:

```html
<meta name="twitter:card" content="summary_large_image" />
<meta property="og:type" content="website">
<meta property="og:title" content="Hello World" />
<meta name="description" content="Blade components are awesome!">
<meta property="og:description" content="Blade components are awesome!">
<meta property="og:image" content="http://example.com/social.jpg" />
<meta property="og:url" content="http://localhost" />
<meta property="og:locale" content="en" />
```

As you can see several `og` and `meta` elements are set. Some are set automatically. The `og:url` will make use of the current page url unless you explicitely pass an url with the `url` attribute. The `og:locale` will make use of the app's locale. By default, `og:type` will be set at `website` but you can pass in another value if you like through the `type` attribute.

And lastly the `twitter:card` value can be adjusted through the `card` attribute. If your image is square you'd probably want to set this to `summary` instead:

```html
<x-social-meta
    title="Hello World"
    card="summary"
    description="Blade components are awesome!"
    image="http://example.com/social.jpg"
/>
```

### HTML Component

You probably want to combine this component with [the `html` component](/docs/{{version}}/html):

```html
<x-html>
    <x-slot name="head">
        <x-social-meta
            title="Hello World"
            description="Blade components are awesome!"
            image="http://example.com/social.jpg"
        />
    </x-slot>

    <h1>Hello World</h1>
</x-html>
```
