<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
   xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
   xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
   http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
@foreach($pages as $page)
   <url>
      <loc>{{ url($page->slug) }}</loc>
      <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <priority>0.9</priority>
   </url>
@endforeach
@foreach($keywords as $keyword) 
   <url>
      <loc>{{ url($keyword->slug) }}</loc>
      <lastmod>{{ $keyword->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <priority>0.9</priority>
   </url>
@endforeach

</urlset>