<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
      $categories = Category::all();


      return response()->view('category', [

          'categories' => $categories,

      ])->header('Content-Type', 'text/xml');
    }
}
