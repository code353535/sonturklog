<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Feed;
use App\Models\Bot;

class AdminController extends Controller
{
    public function index(){


        return view('admin.index');

        }
}
