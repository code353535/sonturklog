<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Site;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Notifications\SahipNotification;
use App\Notifications\SitesilNotification;
use App\Models\Destek;

class SiteController extends Controller
{

    public function ekle(){

    return view('profile.siteekle');

    }

public function index(){



    $id = (Auth::user()->id);


        $site = DB::table('site')->where('user_id', '=', $id)
	  			  ->get();

    return view('siteler.index', ['site' => $site]);
}

public function sahiplik(Request $request){


    $id = $request->id;
    $sahip = DB::table('site')->where('id' , $id)
    ->first();

    if(Auth::user()->id == $sahip->user_id){

    return view('siteler.sahip', ['sahip' => $sahip]);
}
return redirect('/');
}
public function dogrula( Request $request){

    $id = $request->id;
    $dogrula = DB::table('site')->where('id' , $id)
    ->first();

    $url = $dogrula->url;
    try {
    $response = Http::get($url);

    $html = file_get_contents($url);


$dom = new \DomDocument();
@$dom->loadHTML($html);
$xpath = new \DomXPath($dom);
$contents = $xpath->query('//meta[@name="turklog"]/@content');

if ($contents->length === 0) {
     return Redirect::route('sahiplik.onay',['id' => $dogrula->id])->with('error', 'Kodu sitede bulamadık.Herşeyi doğru yaptığınıza emin olun.');
} else {
    DB::table('site')
    ->where('id', $id)
    ->update(['sahip' => "aktif", 'yayin' => "aktif"]);
    $user = auth()->user();
    $user->notify(new SahipNotification($url));
    return Redirect::route('site.index')->with('success', 'Tebrikler! Sitenin sahibi olduğunuzu doğruladınız.');
}

} catch(\Illuminate\Http\Client\ConnectionException $e) {
    return Redirect::route('sahiplik.onay',['id' => $dogrula->id])->with('error', 'Üzgününüz, site adresine ulaşamıyoruz.');
}

}
public function sitesil(Request $request){

    $id = $request->id;
    $site= Site::findOrFail($id);
    if(Storage::exists('logo/'. $site->logo)){
    Storage::delete(['logo/'. $site->logo]);
    $site->Feed()->delete();
    $site->Bot()->delete();
    $site->delete();
    $url = $site->url;
    $user = auth()->user();
    $user->notify(new SitesilNotification($url));
    return redirect(route('site.index',['id' => $id]))->with('success', 'Tebrikler! Kayit başarı ile silindi.');
    }
}

public function redonay(Request $request){
    $id = $request->id;
   $site = DB::table('site')
    ->where('id', $id)
    ->update(['durum' => "bekliyor"]);


    return Redirect::route('site.index')->with('success', 'Sorunları giderdiğinizi onayladınız. Sitenizi tekrar inceleyeceğiz.');
}

public function markAsNotification(Request $request)
    {
      auth()->user()->unreadNotifications->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input('id'));
        })->markAsRead();


        return response()->noContent();
    }

    public function destek(){

        return view('siteler.destek');
    }

    public function destekform(Request $request)
    {

        $validated = $request->validate([
            'dkategori' => 'required',
            'dbaslik' => 'required|max:100',
            'dmesaj' => 'required|min:20|max:500',
        ],
        [
            'dkategori.required' => 'Bu alan zorunludur',
            'dbaslik.required' => 'Bu alan zorunludur',
            'dmesaj.required' => 'Bu alan zorunludur',


        ]);

        if($validated){
            $user_id = auth()->user()->id;
            Destek::create(['dkategori' => $request->dkategori, 'dbaslik' => $request->dbaslik, 'dmesaj' => $request->dmesaj,'user_id' => $user_id]);

    return redirect(route('site.desteklist'))->with('success', 'Destek talebiniz bize ulaştı. En kısa sürede size geri dönüş yapacağız.');
    }
    }

    public function desteklist(){

        $user_id = auth()->user()->id;

        $destek = Destek::where('user_id', $user_id)->get();

        return view('siteler.desteklist', ['destek' => $destek]);
    }

    public function destekdetay(Request $request){


        $id = $request->id;
        $detay = Destek::where('id', $id)->first();
        $user_id = Auth::user()->id;

        if($user_id == $detay->user_id){

        return view('siteler.destekdetay', ['detay' => $detay]);
        }else{

        return redirect(route('site.destek'))->with('error', 'Bu sayfayı görme yetkiniz yok.');
        }
    }

    public function destekedit(Request $request){


        $id = $request->id;

        $validated = $request->validate([
            'dmesaj' => 'required',

        ]);

        $kaydet = Destek::where('id', $id)->first();


        $kaydet->update($validated);

        return redirect(route('site.desteklist'))->with('success', 'Mesajınız başarı ile güncellenmiştir.');
    }

    public function kap(Request $request){

        $id = $request->id;

        $kap = Destek::where('id', $id )->first();
        $user_id = Auth::user()->id;

        if($user_id == $kap->user_id){
            return view('siteler.kap',['kap' => $kap]);
        }else{

        return redirect(route('site.destek'))->with('error', 'Bu sayfayı görme yetkiniz yok.');
        }
        }

        public function sss(){


            return view('siteler.sss');

            }
}
