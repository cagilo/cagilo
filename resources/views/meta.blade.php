<title>{{ $title }}</title>

<!-- Primary Meta Tags -->
<meta name="title" content="{{ $keywords }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="author" content="{{ $author }}">
<meta name="robots" content="{{ $robots }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:url" content="{{ $url }}"/>
<meta property="og:locale" content="{{ app()->getLocale() }}"/>
<meta property="og:title" content="{{ $title }}"/>
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">

<!-- Twitter -->
<meta name="twitter:card" content="{{ $card }}"/>
<meta name="twitter:url" content="{{ $url }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">
