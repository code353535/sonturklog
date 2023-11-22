<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Site;
use App\Models\Anacategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class Siteupdate extends Component
{

    public $ad;
    public $aciklama;
    public $anakategori;
    public $id;
    public $siteler;


    public function mount($id = null) {
        $this->id = $id;
        $siteler = Site::find($this->id);
        if($siteler->user_id !== auth()->user()->id){
            return redirect()->route('site.index')->with('error', 'Üzgünüz! Bu sayfayı görme yetkiniz yok.');
        }
        return true;
    }

    public function update(){

            $this->validate([

                'ad'=>'required|max:30',
                'anakategori'=>'required',
                'aciklama'=>'required|min:50|max:280',

            ]);

        $siteler = Site::find($this->id);

        $siteler->fill([
            "ad"=>$this->ad,
            "anakategori"=>$this->anakategori,
            "aciklama"=>$this->aciklama,
            "durum"=>'bekliyor',

        ])->update();

            return redirect()->route('site.index')->with('success', 'Tebrikler! Kayıt başarı ile güncellendi.');


    }

    public function render()
    {
        $siteler = Site::find($this->id);
        $this->ad = $siteler->ad;
        $this->aciklama = $siteler->aciklama;
        $this->anakategori = $siteler->anakategori;
        $this->id = $siteler->id;

        $anacategory = Anacategory::orderBy('ad')->get();
        return view('livewire.siteupdate', ['anacategory' => $anacategory]);
    }
}
