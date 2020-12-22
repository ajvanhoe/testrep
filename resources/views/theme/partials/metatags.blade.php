<!-- <link href="https://www.citizenship-greece.com" hreflang="x-default" rel="alternate" /> -->

@if($page->metatags)
    <link rel="canonical" href="{{$page->metatags->canonical}}" />
@else
    <link rel="canonical" href="{{route('welcome')}}" />
@endif

<link rel="manifest" href="{{asset('theme/manifest.json')}}">
<meta name="theme-color" content="#C79569"/>


<!-- <meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $page->title ?? 'Buy Gold - African Sovereign Investment Strategic Partners Ltd' }}" />
<meta property="og:description" content="Buy gold from African Sovereign Investment Strategic Partners Ltd company and its licensed dealer. Get the best price and full logistic assistance." />
<meta property="og:url" content="" />
<meta property="og:site_name" content="" />
<meta property="og:image" content="">
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:image:alt" content="TCME logo" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="">
<meta name="twitter:creator" content="">
<meta name="twitter:title" content="">
<meta name="twitter:url" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="{{asset('images/gci-global-citizenship-investment.jpg')}}"> -->
