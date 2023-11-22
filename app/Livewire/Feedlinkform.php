<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Feed;
use Illuminate\Support\Facades\Auth;
use App\Models\Site;
use App\Models\Bot;
use App\Rules\Urlcheck;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Notifications\FeedNotification;
use App\Notifications\FeedsilNotification;
use Illuminate\Database\Eloquent\Builder;


class Feedlinkform extends Component
{
    public $kategori = '';
    public $katlink = '';

    public $userid;
    public $anakategori;
    public $siteid;
    public $id;
    public $sitesay;
    public $deletefeed;

    public function mount($id = null)
    {

        $this->siteid = $id;
        $sit= Site::find($id);
        $this->anakategori = $sit->anakategori;
        $this->userid = $sit->user_id;
        if($this->userid != Auth::user()->id){
            $this->redirect('/');
        }
        if($sit->durum !== 'onaylandi' || $sit->sahip === 'pasif'){
            return redirect()->route('site.index')->with('error', 'Üzgünüz! Yayin ayarları için sitenizin onaylanmış ve sahipliğinin doğrulanmış olması gerekmektedir.');
        }
    }
    public function feedsilmek($fe)
    {

    $this->deletefeed = $fe;
    }

    public function feedsil()
    {

       $feed =  Feed::find($this->deletefeed);
        $feed->Bot()->delete();
        $feed->delete();
        $katlink =$feed->katlink;
        $user = auth()->user();
             $user->notify(new FeedsilNotification($katlink));
        return redirect(route('feed.ekle',['id' => $this->siteid]))->with('success', 'Tebrikler! Linki başarı ile sildiniz.');
    }

    public function render()
    {
        $sit= Site::find($this->siteid);
        $category = Category::where('anacategory_id', '=', $sit->anakategori)->orderBy('ad')->get();

        $feed = Feed::withCount(['bot' => function (Builder $query) {
            $query->where('site_id', $this->siteid);
            }])->where('site_id', $this->siteid)->get();


        $sitesay = $feed->count('site_id');
        $say = $sitesay;


        return view('livewire.feedlinkform',['category' => $category,'feed' => $feed],compact('say'));
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'kategori' => 'required',
                'katlink' => ['required','url','unique:feed,katlink', new Urlcheck],
            ],
            [
                'kategori.required' => 'Bu alan zorunludur',
                'katlink.required' => 'Bu alan zorunludur',
                'katlink.url' => 'Bir url adresi giriniz.',
                'katlink.unique' => 'Bu adres zaten kaydedilmiş.',

            ]);

     if($validatedDate){

        Feed::create(['kategori' => $this->kategori, 'katlink' => $this->katlink, 'site_id' => $this->siteid, 'user_id' => $this->userid, 'anakategori' => $this->anakategori]);
       $katlink =$this->katlink;
       $user = auth()->user();
            $user->notify(new FeedNotification($katlink));
        return redirect(route('feed.ekle',['id' => $this->siteid]))->with('success', 'Tebrikler! Linki başarı ile eklediniz.');
     }

}
}
