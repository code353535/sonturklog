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
                <title><![CDATA[{{ $blog->baslik }}]]></title>
                <link>{{ $blog->url }}</link>
                <description><![CDATA[{!! $blog->aciklama !!}]]></description>
                <guid>{{$blog->id }}</guid>
                <pubDate>{{ $blog->pubdate }}</pubDate>
                <image>{{ $blog->image }}</image>

            </item>
        @endforeach
    </channel>
</rss>
