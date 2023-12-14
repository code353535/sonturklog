<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use App\Notifications\SiteonayNotification;
use App\Models\User;
use App\Models\Bot;
use App\Models\Feed;
use App\Models\Anacategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AdminsiteController extends Controller
{
    public function index(){

        $site = Site::all();
        return view('admin.siteler.sitelist',['site' => $site]);
}

public function update(site $site){
    $anacategory = Anacategory::all();
    Site::find($site);
    return view('admin.siteler.siteupdate', ['site' => $site, 'anacategory' => $anacategory]);
}

public function kaydet(site $site , Request $request){

    $validated = $request->validate([
        'ad' => 'required',
        'url' =>  ['required', Rule::unique('site')->ignore($site->id)],
        'aciklama' => 'required',
        'durum' => 'required',
        'sahip' => 'required',
        'yayin' => 'required',
        'anakategori' => 'required',
        'rednedeni' => 'max:150',
    ]);

    $site->update( $validated);

    if($site->wasChanged('durum') && ($request->durum == 'onaylandi')){
        $bul = Site::find($site->url);
        $userid = $site->user_id;
        $url = $request->url;
        $user = User::find($userid);
        $user->notify(new SiteonayNotification($url));

    }


    return Redirect::route('admin.sitelist');

}
public function sitedestroy(site $site,Request $request){

    $id = $site->id;
    $site= Site::findOrFail($id);
    if(Storage::exists('logo/'. $site->logo)){
    Storage::delete(['logo/'. $site->logo]);
    $site->Feed()->delete();
    $site->Bot()->delete();
    $site->delete();

    return Redirect::route('admin.sitelist');
    }
}
public function onaybekleyen(){

    $site = Site::where('durum', 'bekliyor')
    ->where('sahip','aktif')
    ->orderBy('id')
    ->get();


    return view('admin.siteler.siteonaybekleyen',['site' => $site]);
}
public function onayli(){

    $site = Site::where('durum', 'onaylandi')
    ->orderBy('id')
    ->get();


    return view('admin.siteler.siteonayli',['site' => $site]);
}

public function feedlist(site $site){

    $this->siteid = $site->id;
    $feed = Feed::withCount(['bot' => function (Builder $query) {
        $query->where('site_id', $this->siteid);
        }])->where('site_id', $this->siteid)->get();



    return view('admin.siteler.feedlist',['feed' => $feed]);
}
public function feededit(feed $feed){

    $category = Category::all();

    return view('admin.siteler.feededit',['feed' => $feed, 'category' => $category]);
}

public function feedupdate(feed $feed , Request $request){

    $validated = $request->validate([
        'kategori' => 'required',
        'katlink' =>  'required',

    ]);

    $feed->update($validated);

    return Redirect::route('admin.sitelist');
}
public function feeddestroy(feed $feed,Request $request){

    $feed =  Feed::find($feed->id);
    $feed->Bot()->delete();
    $feed->delete();
    return Redirect::route('admin.sitelist');
    }

    public function botlist(feed $feed,Request $request){

        $feed_id = $feed->id;
        $bot =  Bot::where('feed_id', $feed_id)->get();

        return view('admin.siteler.botlist',['bot' => $bot]);
        }
        public function botdestroy(bot $bot,Request $request){

            $botid = $bot->id;
            $bot= Bot::findOrFail($botid);
            $bot->delete();

            return Redirect::route('admin.sitelist');
    }

            public function siteekle(){
                $anacategory = Anacategory::all();


            return view('admin.siteler.siteekle', ['anacategory' => $anacategory]);
    }

            public function siteeklekaydet(Request $request){

                $validated = $request->validate([
                    'ad' => 'required',
                    'url' => 'required|unique:site',
                    'kategori' => 'required',
                    'aciklama' => 'required',
                    'logo' => 'required',
                ]);

                $logo_name = $request->ad . $request->logo->getClientOriginalName();
                $upload_logo = $request->logo->storeAs('logo', $logo_name);

                if($upload_logo){
                    $values = array(
                        "ad"=>$request->ad,
                        "url"=>$request->url,
                        "kategori"=>$request->kategori,
                        "aciklama"=>$request->aciklama,
                        "logo"=>$logo_name,
                        "user_id"=>auth()->id(),
                        "created_at"=>Carbon::now(),
                        "durum"=> 'onaylandi',
                        "yayin"=>'aktif',
                        "sahip"=>'aktif',
                    );

                    Site::insert($values);

             return Redirect::route('admin.sitelist');
    }
}

}
