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
                <title>{{ $haber->baslik }}</title>
                <link>{{ 'https://turklog.net/detaylar/' . $haber->id . '/' . Str::slug($haber->baslik) }}</link>
                <description><![CDATA[{!! $haber->aciklama !!}]]></description>
                <guid>{{ 'https://turklog.net/detaylar/' . $haber->id . '/' . Str::slug($haber->baslik) }}</guid>
                @php
                use Carbon\Carbon;
                // Convert your post's created_at timestamp to a Carbon instance
                $pubDate = Carbon::parse($haber->created_at)->format('D, d M Y H:i:s') . ' ' . Carbon::parse($haber->created_at)->timezone->getName();
            @endphp
                <pubDate>{{ $pubDate }}</pubDate>
                <image>{{ $haber->image }}</image>
            </item>
        @endforeach
    </channel>
</rss>
