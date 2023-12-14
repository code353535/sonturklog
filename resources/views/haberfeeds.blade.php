<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title><![CDATA[ Turklog.net ]]></title>
        <link><![CDATA[ https://turklog.net/haberfeed]]></link>
        <description><![CDATA[ Haberleri ve gündemi takip edin ]]></description>
        <language>tr</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($haberfeeds as $haber)
            <item>
                <title><![CDATA[{{ $haber->baslik }}]]></title>
                <link>{{ $haber->url }}</link>
                <description><![CDATA[{!! $haber->aciklama !!}]]></description>
                <guid>{{$haber->id }}</guid>
                <pubDate>{{ $haber->pubdate }}</pubDate>
                <image>{{ $haber->image }}</image>
            </item>
        @endforeach
    </channel>
</rss>
