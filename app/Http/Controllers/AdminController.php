<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Feed;
use App\Models\Bot;

class AdminController extends Controller
{
    public function index(){

        $site = Site::where('sahip','aktif')
        ->where('durum', 'bekliyor')
        ->count();

        $topsite = Site::all()
        ->count();

        $feedtop = Feed::all()->count();
        $bottop = Bot::all()->count();

        return view('admin.index',['site' => $site, 'topsite' => $topsite, 'feedtop' => $feedtop, 'bottop' => $bottop]);

        }
}
