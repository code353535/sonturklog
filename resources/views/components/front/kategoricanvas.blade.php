<div x-data="{ Open: false }" class="" x-cloak="false">
    <a href="#" @click=" Open = ! Open" type="submit" class="py-1.5 hover:text-white hover:bg-black px-2">
       Kategoriler
    </a>
    <div x-show="Open" class="fixed inset-0 top-0 h-screen z-40 w-full bg-black/50"></div>
<div x-cloak class="fixed left-0 w-1/4 px-2 h-screen px-2 h-screen min-w-[290px] top-0 bg-white py-4 mb-4 z-50 overflow-y-auto"
x-show="Open"
x-transition:enter="transition origin-top ease-out duration-300"
x-transition:enter-start="transform -translate-x-full opacity-0"
x-transition:enter-end="transform translate-y-0 opacity-100"
x-transition:leave="transition origin-top ease-in duration-300"
x-transition:leave-start="transform -translate-y-0 opacity-100"
x-transition:leave-end="transform -translate-x-full opacity-0"
    @click.away=" Open = false"
    >

    <div class="flex flex-col space-y-6">
        <div class="flex flex-row px-2">
            <div class="flex basis-1/2 items-center">
                <div class="flex flex-col"><span class="font-black text-2xl text-black oswald">Turklog.net </span>

                </div>

            </div>
        <div class="flex basis-1/2 items-center justify-end"><button @click=" Open = ! Open" type="submit">
        <i x-show="Open" class="fa-solid fa-xmark fa-xl text-black hover:text-orange-500 hover:rotate-90 transition ease-out duration-500"></i>
        </button>
        </div>
        </div>
        <div class="mb-4 flex justify-center bg-black shadow-md shadow-slate-500/40">
            <span class="py-2 bg-black text-md font-bold text-white">HABERLER</span>
            </div>
            <div class="releative w-full text-black">
                @if(count($anacategory) > 0)
                @foreach ($anacategory as $cat)
                <div>
                    <a href="{{ route('front.kategori',['cat' => $cat->slug]) }}" class="block px-4 py-1 text-md font-bold text-black hover:text-white  hover:bg-black">{{ $cat->ad }}</a>
                  </div>
                  <hr class="h-px px-6 my-1 border-1 border-solid border-gray-200">
                  @endforeach
                  @else
                  Kayıt bulunamadı
                  @endif
            </div>

        <div class="mb-4 flex justify-center bg-black shadow-md shadow-slate-500/40">
        <span class="py-2 bg-black text-md font-bold text-white">BLOGLAR</span>
        </div>
        <div class="releative w-full text-black">
            @if(count($category) > 0)
            @foreach ($category as $cat)
            <div>
                <a href="{{ route('front.kategori',['cat' => $cat->slug]) }}" class="block px-4 py-1 text-md font-bold text-black hover:text-white  hover:bg-black">{{ $cat->ad }}</a>
              </div>
              <hr class="h-px px-6 my-1 border-1 border-solid border-gray-200">
              @endforeach
              @else
              Kayıt bulunamadı
              @endif
        </div>

    </div>
</div>
</div>
