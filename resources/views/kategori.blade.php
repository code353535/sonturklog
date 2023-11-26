<x-front.layout>
    <div class="lg:mx-[170px] flex justify-center oswald">
<div class=" flex items-center py-6 mx-auto font-bold text-xl text-black"><i class="fa-solid fa-layer-group mr-1"></i>Kategori : {{ $bul->anacategory->ad }} / {{ $bul->ad }}</div>
</div>

@if(count($kategorid) > 0)
<div class="lg:mx-[170px] max-md:mx-4 max-md:mt-4 max-md:mb-4 md:py-6 md:px-6 pb-6 bg-black">
<div class="swiper-container2">
                <div class="swiper sample-slider2">
                    <div class="swiper-wrapper">
        @foreach ($kategorid as $fee)
        <div class="swiper-slide">
        <div class="relative">

            <img
            class="max-h-[240px] min-h-[240px] w-full object-cover"
            src="{{ $fee->image }}"
            onerror="this.onerror=null;this.src='image/yoksa.png';"
          />
          <div class="oswald absolute bottom-0 w-full bg-black/30 py-2">
            <div class="px-2"><span class="inline-flex items-center bg-orange-500 px-2 text-xs text-white ring-0"><a href="" class="hover:text-black">{{ $fee->category->ad }}</a></span></div>
             <div class="text-white px-2 py-1 font-semibold text-lg leading-6 py-1"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank"> {{ $fee->baslik }}</>
             </div>
             <div class="text-xs font-bold px-2"><a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline text-white">{{ $fee->site?->ad }}</a> - <span class="text-white font-light">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }} - <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a></span></div>
           </div>
    </div>
</div>
    @endforeach
</div>
<div class="swiper-button-next"><i class="fa-solid fa-angles-right fa-lg"></i></div>
      <div class="swiper-button-prev"><i class="fa-solid fa-angles-left fa-lg"></i></div>
</div>
<div class="swiper-pagination"></div>
</div>
</div>
@endif

    <div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row gap-4 mt-6">
        <div class="w-full gap-4">
            @if(count($kategori) > 0)

            @foreach($kategori->chunk(4) as $chunk)
            <div class="flex flex-row max-xl:flex-wrap gap-4">

            @foreach ($chunk as $i => $fee)
            @continue($i < 8)
            <div class="flex flex-col w-full mb-4 border">
            <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[170px] max-h-[270px]">
                <a href="{{ $fee->url }}" class="" target="_blank"> <img src="{{ $fee->image }}" class="xl:h-[170px] h-[270px] min-w-full hover:scale-110 transition duration-500 object-cover" onerror="this.onerror=null;this.src='image/yoksa.png';" alt=""/></a>
            </div>
            <div class="flex justify-between">
                <div class="text-xs flex items-center px-2"><img src="{{ URL::asset('storage/logo/' .$fee->site?->logo) }}" class="h-6 w-6 mr-2" /> <a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline">{{ $fee->site?->ad }}</a>
                </div>
                <div class="flex text-xs items-center">
                    <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a>
                    </div>
            </div>
            <div class="oswald flex grow px-1 text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank">{{ $fee->baslik }}</a></div>
            <div class="flex justify-between px-2 pb-3 text-gray700">
                <div class="text-xs"><a href="" class="hover:underline">{{ $fee->category->ad  }}</a> </div>
                <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }}
            </div>
            </div>
        </div>
            @endforeach

        </div>
            @endforeach
            {{ $kategori->links() }}

            @else
            <div class="flex justify-center">Kayıt bulunamadı</div>
            @endif
        </div>

        </div>


</x-front.layout>
