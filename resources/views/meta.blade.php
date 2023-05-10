<title>{!! $title !!}</title>

{{-- Primary Meta Tags --}}
<meta name="title" content="{!! $title !!}">
<meta name="description" content="{!! $description !!}">

@empty(!$keywords)
<meta name="keywords" content="{!! $keywords !!}">
@endempty

@empty(!$author)
<meta name="author" content="{!! $author !!}">
@endempty

@empty(!$robots)
<meta name="robots" content="{!! $robots !!}">
@endempty

@empty(!$csp)
    <meta http-equiv="Content-Security-Policy"
          content="default-src 'self' data: 'unsafe-inline' 'unsafe-hashes' 'unsafe-eval' {{$csp}}">
@endempty
{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{!! $type !!}">
<meta property="og:url" content="{!! $url !!}"/>
<meta property="og:locale" content="{!! app()->getLocale() !!}"/>
<meta property="og:title" content="{!! $title !!}"/>
<meta property="og:description" content="{!! $description !!}">
<meta property="og:image" content="{!! $image !!}">

{{--  Twitter --}}
<meta name="twitter:card" content="{!! $card !!}"/>
<meta name="twitter:url" content="{!! $url !!}">
<meta name="twitter:title" content="{!! $title !!}">
<meta name="twitter:description" content="{!! $description !!}">
<meta name="twitter:image" content="{!! $image !!}">
