<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\Feed;
use Exception;
use Illuminate\Support\Facades\Log;
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

                        $response = Http::timeout(60)
                        ->get($item->katlink);

                        if ($response->clientError()) {
                            $r = Http::post($item->katlink);

                            if($r->failed()) {
                                Feed::where('katlink', $item->katlink)
                                    ->delete();
                            Log::info('URL client hatasi sonucu silindi', [
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
                                    Log::info('URL server hatasi sonucu silindi', [
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
                            Log::info('URL exception hatasi sonucu silindi', [
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

               try {
                    $feed = simplexml_load_string($response->body());
                    } catch(RequestException $e) {
                        $hat = [$e ,$item->katlink];
                    $sill = $hat[1];
                        if($hat){
                            $deleted = Feed::where('katlink', $sill)->delete();
                            Log::info('URL RequestException hatasi sonucu silindi', [
                                'url' => $item->katlink,
                                ]);
                            continue;
                            }
                }
                        if($feed){
                            foreach ($feed->channel->item as $article) {
                                if($article->title && $article->link){


                                    $desc = $article->description;
                                    $des = strip_tags($desc);
                                    $postDate = $article->pubDate;
                                    $pubdate = date('Y-m-d H:i:s',strtotime($postDate));

                                    $img = $article->description;
                                    $image= (string)$article->children('http://purl.org/rss/1.0/modules/content/')->encoded;

                                    $tarih = date('Y-m-d H:i:s');
                                    $sontarih = date('Y-m-d H:i:s',strtotime($tarih . "-1 days"));

                                    if($pubdate >= $sontarih){


                                    if (preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $img, $matches)) {

                                    $src = $matches[1];

                                DB::table('bot')->insertOrIgnore([
                                    'site_id' => $site_id,
                                    'user_id' => $user_id,
                                    'kategori' => $kategori,
                                    'anakategori' => $anakategori,
                                    'aciklama' => $des,
                                    'feed_id' => $feed_id,
                                    'baslik' => $article->title,
                                    'url' => $article->link,
                                    'image' => $src,
                                    'pubdate' => $pubdate,
                                    'tiklasay' => '1',
                                    'created_at' => Carbon::now(),
                                    'updated_at' => Carbon::now()
                                ]);


                        }elseif($article->children("media", true)->content->attributes() != null){
                            $src = $article->children("media", true)->content->attributes();
                            DB::table('bot')->insertOrIgnore([
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $article->title,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        }elseif($article->image){
                            $src = $article->image;
                            DB::table('bot')->insertOrIgnore([
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $article->title,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        }elseif($article->imageUrl){
                            $src = $article->imageUrl;
                            DB::table('bot')->insertOrIgnore([
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $article->title,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        }elseif($article->children("media", true)->thumbnail->attributes() != null){
                            $srcc = $article->children("media", true)->thumbnail->attributes();
                            $src = $srcc['url'];
                            DB::table('bot')->insertOrIgnore([
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $article->title,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);
                        }elseif($article->enclosure->attributes() != null){
                            $srcc = $article->enclosure->attributes();
                            $src = $srcc['url'];
                            DB::table('bot')->insertOrIgnore([
                                'site_id' => $site_id,
                                'user_id' => $user_id,
                                'kategori' => $kategori,
                                'anakategori' => $anakategori,
                                'aciklama' => $des,
                                'feed_id' => $feed_id,
                                'baslik' => $article->title,
                                'url' => $article->link,
                                'image' => $src,
                                'pubdate' => $pubdate,
                                'tiklasay' => '1',
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now()
                            ]);



                        }elseif(preg_match( '|<img.*?src=[\'"](.*?)[\'"].*?>|i', $image, $matches)){
                            $src = $matches[1];


                        DB::table('bot')->insertOrIgnore([
                            'site_id' => $site_id,
                            'user_id' => $user_id,
                            'kategori' => $kategori,
                            'anakategori' => $anakategori,
                            'aciklama' => $des,
                            'feed_id' => $feed_id,
                            'baslik' => $article->title,
                            'url' => $article->link,
                            'image' => $src,
                            'pubdate' => $pubdate,
                            'tiklasay' => '1',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]);

                    }else{
                        DB::table('bot')->insertOrIgnore([
                            'site_id' => $site_id,
                            'user_id' => $user_id,
                            'kategori' => $kategori,
                            'anakategori' => $anakategori,
                            'aciklama' => $des,
                            'feed_id' => $feed_id,
                            'baslik' => $article->title,
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
