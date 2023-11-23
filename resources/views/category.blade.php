<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categories as $category)
    <url>
        <loc>{{'https://www.turklog.net/kategori/'.$category->slug}}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toDateString()}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
</urlset>
