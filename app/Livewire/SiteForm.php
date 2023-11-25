<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Site;
use App\Models\Anacategory;
use Illuminate\Support\Str;
use App\Rules\Siteurl;
use App\Notifications\SiteekleNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class SiteForm extends Component
{
    use WithFileUploads;

    public $ad;
    public $url;
    public $aciklama;
    public $anakategori;
    public $resim;
    public $logo;
    public $id;


    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount($id = null) {
        $this->currentStep = 1;
    }

    public function render()
    {
        $userid = auth()->user()->id;

        $kayitsay = Site::where('user_id', $userid)->count();

        $anacategory = Anacategory::orderBy('ad')
        ->WhereNotIn('id', [3])
        ->get();
        return view('livewire.site-form', ['anacategory' => $anacategory , 'kayitsay' => $kayitsay]);
    }
    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1 ){
            $this->currentStep = 1;
    }
}
    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'ad'=>'required|max:50',
                'url'=>['required','url','unique:site', new Siteurl],
                'anakategori'=>'required',


            ]);

        }
        elseif ($this->currentStep == 2){
            $this->validate([

                'aciklama'=>'required|min:50|max:280',
        ]);

        }

    }
    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 3){
            $this->validate([
                'logo' => 'required|image|mimes:png,jpg,gif,jpeg,webp|max:1024|dimensions:width=150,height=150',

            ]);
        }

        $logo_name = $this->ad . $this->logo->getClientOriginalName();
        $upload_logo = $this->logo->storeAs('logo', $logo_name);

        if($upload_logo){
            $values = array(
                "ad"=>$this->ad,
                "url"=>$this->url,
                "anakategori"=>$this->anakategori,
                "aciklama"=>$this->aciklama,
                "logo"=>$logo_name,
                "user_id"=>auth()->id(),
                "created_at"=>Carbon::now()

            );
        $basari = auth()->id();
            Site::insert($values);
            $user = auth()->user();
            $url = $this->url;
            $user->notify(new SiteekleNotification($url));
            return Redirect::route('site.index')->with('success', 'Tebrikler! Sitenizi başarı ile eklediniz.');
        }

    }
}
