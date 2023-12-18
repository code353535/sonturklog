<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Turklog.net ]]></title>
        <link><![CDATA[ https://turklog.net/blogfeed]]></link>
        <description><![CDATA[ Blogları takip edin ]]></description>
        <language>tr</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($blogfeeds as $blog)
            <item>
                <title>{{ $blog->baslik }}</title>
                <link>{{ 'https://turklog.net/detaylar/' . $blog->id . '/' . Str::slug($blog->baslik) }}</link>
                <description><![CDATA[{!! $blog->aciklama !!}]]></description>
                <guid>{{ 'https://turklog.net/detaylar/' . $blog->id . '/' . Str::slug($blog->baslik) }}</guid>
                <pubDate>{{ date("D, d M Y H:i:s O", strtotime($blog->pubDate)) }}</pubDate>
                <image>{{ $blog->image }}</image>
            </item>
        @endforeach
    </channel>
</rss>
