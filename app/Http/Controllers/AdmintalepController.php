<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destek;
use Illuminate\Support\Facades\Redirect;

class AdmintalepController extends Controller
{
    public function list(){

        $destek = Destek::all();

        return view('admin.destek.list',['destek' => $destek]);

        }

        public function edit(destek $destek , Request $request){

            return view('admin.destek.edit',['destek' => $destek]);


            }
            public function update(destek $destek ,Request $request){

                $validated = $request->validate([
                    'dcevap' => 'required',
                    'dmesaj' =>  'required',
                    'dstatus' =>  'required',
                ]);

                $destek->update($validated);

                return Redirect::route('admin.desteklist');

                }

    }

