<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\Feed;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Client\RequestException;


class Botara extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:botara';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        libxml_use_internal_errors(true);

            $urls = DB::table('feed')
                ->get();


            $responses = Http::pool(function (Pool $pool) use ($urls) {
                foreach ($urls as $item) {

                    $alias = $item->site_id . '|' . $item->katlink . '|' . $item->kategori. '|' . $item->user_id. '|' . $item->id. '|' .$item->anakategori;


                    try {

                        $response = Http::timeout(30)
                        ->get($item->katlink);


                        if ($response->clientError()) {
                            $r = Http::post($item->katlink);

                            if($r->failed()) {
                                Feed::where('katlink', $item->katlink)
                                    ->delete();
                            Log::error('URL client hatasi sonucu silindi', [
                                    'url' => $item->katlink,
                                    ]);
                                    continue;
                            }
                        }


                        if ($response->serverError()) {
                            $re = Http::post($item->katlink);

                            if($re->failed()) {
                                Feed::where('katlink', $item->katlink)
                                    ->delete();
                                    Log::error('URL server hatasi sonucu silindi', [
                                        'url' => $item->katlink,
                                        ]);
                                    continue;
                            }
                        }
                    } catch(Exception $e) {
                        $hatasil = [$e ,$item->katlink];
                    $sil = $hatasil[1];
                        if($hatasil){
                            $deleted = Feed::where('katlink', $sil)->delete();
                            Log::error('URL Exception hatasi. Url silindi.', [
                                'url' => $item->katlink,
                                ]);
                            continue;
                            }
                }

                    $requests[] = $pool->as($alias)
                        ->get($item->katlink);

                }

                return $requests;
            });

            foreach ($responses as $alias => $response) {

                $site_id = explode('|', $alias)[0];
                $user_id = explode('|', $alias)[3];
                $kategori = explode('|', $alias)[2];
                $feed_id = explode('|', $alias)[4];
                $anakategori = explode('|', $alias)[5];

                if ($response->successful()) {
                $body = $response->body();
                $feed = simplexml_load_string($body);
            } else {
                $statusCode = $response->status();
                Log::alert('Bir Hata Oluştu', [
                    'hatakodu' => $statusCode,
                    'url' => $item->katlink,
                    ]);

            }
                        if($feed){
                            foreach ($feed->channel->item as $article) {
                                if($article->title){
                                    $desc = $article->description;
                                    $des = strip_tags($desc);
                                    $baslik = html_entity_decode($article->title, ENT_COMPAT, 'UTF-8');


                                    $postDate = $article->pubDate;
                                    $pubdate = date('Y-m-d H:i:s',strtotime($postDate));

                                    $img = $article->description;
                                    $image= (string)$article->children('http://purl.org/rss/1.0/modules/content/')->encoded;

                                    $tarih = date('Y-m-d H:i:s');
                                    $sontarih = date('Y-m-d H:i:s',strtotime($tarih . "-1 days"));

                                    if($pubdate >= $sontarih){


                                    if (preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $img, $matches)) {

                                    $src = $matches[1];

                                    $data = [
                                    'site_id' => $site_id,
                                    'user_id' => $user_id,
                                    'kategori' => $kategori,
                                    'anakategori' => $anakategori,
                                    'aciklama' => $des,
                                    'feed_id' => $feed_id,
                                    'baslik' => $baslik,
                                    'url' => $article->link,
                                    'image' => $src,
                                    'pubdate' => $pubdate,
                                    'tiklasay' => '1',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ];
                                DB::table('bot')->insertOrIgnore($data);


                        }elseif($article->children("media", true)->content->attributes() != null){
                            $src = $article->children("media", true)->content->attributes();
                            $data = [
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $baslik,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ];
                            DB::table('bot')->insertOrIgnore($data);


                        }elseif($article->image){
                            $src = $article->image;
                            $data = [
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $baslik,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ];
                            DB::table('bot')->insertOrIgnore($data);


                        }elseif($article->imageUrl){
                            $src = $article->imageUrl;
                            $data = [
                                    'site_id' => $site_id,
                                    'user_id' => $user_id,
                                    'kategori' => $kategori,
                                    'anakategori' => $anakategori,
                                    'aciklama' => $des,
                                    'feed_id' => $feed_id,
                                    'baslik' => $baslik,
                                    'url' => $article->link,
                                    'image' => $src,
                                    'pubdate' => $pubdate,
                                    'tiklasay' => '1',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ];
                                DB::table('bot')->insertOrIgnore($data);


                        }elseif($article->children("media", true)->thumbnail->attributes() != null){
                            $srcc = $article->children("media", true)->thumbnail->attributes();
                            $src = $srcc['url'];
                             $data = [
                                    'site_id' => $site_id,
                                    'user_id' => $user_id,
                                    'kategori' => $kategori,
                                    'anakategori' => $anakategori,
                                    'aciklama' => $des,
                                    'feed_id' => $feed_id,
                                    'baslik' => $baslik,
                                    'url' => $article->link,
                                    'image' => $src,
                                    'pubdate' => $pubdate,
                                    'tiklasay' => '1',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ];
                                DB::table('bot')->insertOrIgnore($data);


                        }elseif($article->enclosure->attributes() != null){
                            $srcc = $article->enclosure->attributes();
                            $src = $srcc['url'];
                               $data = [
                                    'site_id' => $site_id,
                                    'user_id' => $user_id,
                                    'kategori' => $kategori,
                                    'anakategori' => $anakategori,
                                    'aciklama' => $des,
                                    'feed_id' => $feed_id,
                                    'baslik' => $baslik,
                                    'url' => $article->link,
                                    'image' => $src,
                                    'pubdate' => $pubdate,
                                    'tiklasay' => '1',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ];
                                DB::table('bot')->insertOrIgnore($data);


                        }elseif(preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches)){
                            $src = $matches[1];

                            $data = [
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $baslik,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ];
                            DB::table('bot')->insertOrIgnore($data);


                    }else{
                        DB::table('bot')->insertOrIgnore([
                            'site_id' => $site_id,
                            'user_id' => $user_id,
                            'kategori' => $kategori,
                            'anakategori' => $anakategori,
                            'aciklama' => $des,
                            'feed_id' => $feed_id,
                            'baslik' => $baslik,
                            'url' => $article->link,
                            'pubdate' => $pubdate,
                            'tiklasay' => '1',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);
                    }
                }
                    }

                }
            }

        }
}
}

