<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bot;

class RssFeedController extends Controller
{
    public function haberfeed()
    {
        $haberfeeds = Bot::where('anakategori', '2')->
        orderBy('pubdate', 'desc')->
        limit(200)->get();
        return response()->view('haberfeeds', compact('haberfeeds'))->header('Content-Type', 'application/xml');

    }
    public function blogfeed()
    {
        $blogfeeds = Bot::where('anakategori', '1')->
        orderBy('pubdate', 'desc')->
        limit(200)->get();
        return response()->view('blogfeeds', compact('blogfeeds'))->header('Content-Type', 'application/xml');

    }
}
