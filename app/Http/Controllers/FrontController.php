<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bot;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class FrontController extends Controller
{
    public function gizlilik()
    {
        return view('gizlilikpolitikasi');
    }
    public function sartlar()
    {
        return view('kullanimsartlari');
    }
    public function yayinsartlari()
    {
        return view('yayinsartlari');
    }

    public function index()
    {
        $manset = Bot::with('site')
        ->where('anakategori', '2')
        ->whereNotNull('image')
        ->WhereNotIn('kategori', [17])
        ->WhereNotIn('kategori', [18])
        ->orderByDesc('pubdate')
        ->take(15)
        ->get();

        $okunan = Bot::with('site')
        ->where('anakategori', '2')
        ->whereDate('pubdate', '>=', Carbon::now()->subDay())
        ->orderByDesc('tiklasay')
        ->take(5)
        ->get();

        $yanmanset = Bot::with('site')
        ->where('anakategori', '2')
        ->where('kategori', '18')
        ->whereNotNull('image')
        ->orderByDesc('pubdate')
        ->take(10)
        ->get();

        $feeddd = Bot::with('site')
        ->where('anakategori', '2')
        ->WhereNotIn('kategori', [17])
        ->WhereNotIn('kategori', [18])
        ->orderByDesc('pubdate')
        ->skip(15)
        ->take(12)
        ->get();

        $feedddd = Bot::with('site')
        ->where('anakategori', '2')
        ->where('kategori', '17')
        ->orderByDesc('pubdate')
        ->skip(3)
        ->take(12)
        ->get();

        $feeddddd = Bot::with('site')
        ->where('anakategori', '2')
        ->where('kategori', '18')
        ->orderByDesc('pubdate')
        ->skip(10)
        ->take(12)
        ->get();

        $fed = Bot::with('site')
        ->where('anakategori', '2')
        ->where('kategori', '17')
        ->orderByDesc('pubdate')
        ->take(3)
        ->get();

        return view('index',['manset' => $manset, 'yanmanset' => $yanmanset, 'feeddd' => $feeddd, 'feedddd' => $feedddd, 'fed' => $fed, 'feeddddd' => $feeddddd, 'fed' => $fed,'okunan' => $okunan]);
    }

    public function linksay(Request $request){

        $id = $request->id;
         $say = Bot::findOrFail($id)->increment('tiklasay');


        return response()->noContent();


     }
     public function detay(Request $request){

        $id = $request->id;

         $detay = Bot::where('id' ,$id)->first();
         $kat = $detay->kategori;
         $kategori =Bot::with('site')->where('kategori', $kat)
         ->wherenotNull('image')
        ->orderByDesc('pubdate')
        ->take(12)
        ->get();

         return view('detaylar',['detay' => $detay , 'kategori' => $kategori]);

     }

     public function kategorilist(Request $request){

        $cat = $request->cat;
        $bul = Category::where('slug', $cat)->first();
        $buldum = $bul?->id;
        $kategori =Bot::with('site')->where('kategori', $buldum)
        ->where('anakategori', $bul->anacategory_id)
        ->wherenotNull('image')
        ->orderByDesc('pubdate')
        ->paginate(28);

        $kategorid =Bot::with('site')->where('kategori', $buldum)
        ->where('anakategori', $bul->anacategory_id)
        ->wherenotNull('image')
        ->orderByDesc('pubdate')
        ->take(8)
        ->get();

        return view('kategori',['kategori' => $kategori, 'kategorid' => $kategorid, 'bul' => $bul]);
     }

     public function bloglar(Request $request){

        $okunanblog = Bot::with('site')
        ->where('anakategori', '1')
        ->whereDate('pubdate', '>=', Carbon::now()->subDay())
        ->orderByDesc('tiklasay')
        ->take(5)
        ->get();

        $bloglar = Bot::with('site')
        ->where('anakategori', '1')
        ->whereNotNull('image')
        ->orderByDesc('pubdate')
        ->skip(8)
        ->take(28)
        ->get();

        $yanmansetblog = Bot::with('site')
        ->where('anakategori', '1')
        ->whereNotNull('image')
        ->orderByDesc('pubdate')
        ->take(5)
        ->get();

        $blogpop = Bot::with('site')
        ->where('anakategori', '1')
        ->whereNotNull('image')
        ->orderByDesc('pubdate')
        ->skip(5)
        ->take(3)
        ->get();

        return view('bloglar',['okunanblog' => $okunanblog, 'bloglar' => $bloglar, 'yanmansetblog' => $yanmansetblog, 'blogpop' => $blogpop]);
     }

}
