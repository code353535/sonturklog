<x-front.layout>


<div class="lg:mx-[170px] mx-6 max-md:mx-0 flex flex-col xl:flex-row md:mt-6 gap-4">

    <div class="swiper-container xl:basis-2/4">
<div class="swiper sample-slider">
    <div class="swiper-wrapper">
        @foreach ($manset as $fee)
        <div class="swiper-slide">
            <a href="{{ $fee->url }}" class="link" id="{{$fee->id}}" target="_blank"> <img
            class="max-h-[350px] min-h-[350px]"
            src="{{ $fee->image }}" onerror="this.onerror=null;this.src='image/yoksa.png';"
            alt=""
          /></a>
          <div class="max-md:hidden absolute top-4 left-0 bg-white text-black px-2 py-1 font-bold text-xs oswald"><i class="fa-regular fa-clock mr-2"></i>GÜNDEM</div>
          <div class="oswald absolute bottom-0 md:w-[400px] w-full bg-black/30 py-3 pl-2">
           <div class="px-2"><span class="inline-flex items-center bg-orange-500 px-2 text-sm text-white ring-0"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:text-black">{{ $fee->category->ad }}</a></span></div>
            <div class="text-white px-2 py-1 font-semibold text-2xl leading-6 py-1"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank"> {{ $fee->baslik }}</a>
            </div>
            <div class="text-sm font-bold px-2 text-white"><a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline text-white">{{ $fee->site?->ad }}</a> - <span class="text-white font-light">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }} - <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline text-white">detaylar</a></span></div>
          </div>
        </div>

        @endforeach
      </div>
      <div class="swiper-button-next"><i class="fa-solid fa-angles-right"></i></div>
      <div class="swiper-button-prev"><i class="fa-solid fa-angles-left"></i></div>
    </div>

      <div class="swiper-pagination max-2xl:hidden"></div>

</div>

    <div class="xl:basis-1/4">
       <div class="bg-white text-black max-md:mx-4 px-3 md:min-h-[390px] max-h-[390px] py-2 border-2 border-gray-200 overflow-y-auto">
        <div class="oswald text-MD text-black font-bold">GÜNÜN DİKKAT ÇEKENLERİ</div>
        <hr class="my-1 border-orange-500 border w-16 mb-3">
        @foreach ($okunan as $fee)

                <div class="text-md flex flex-row py-1 group/edit">
                    <div class="oswald flex items-center text-2xl pr-2 font-bold text-black group-hover/edit:text-orange-500">{{ $loop->iteration }}</div>
                <div class=" text-sm font-bold px-2 py-1 group-hover/edit:bg-black group-hover/edit:text-white group-hover/edit:shadow-md group-hover/edit:shadow-slate-500/50 ease-in duration-300"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link">{{ $fee->baslik }}</a></div>

            </div>


                @endforeach

       </div>
    </div>
    <div class="xl:basis-1/4 max-md:mx-4">
        <div class="swiper-container1 flex flex-col gap-4 md:min-h-[390px] max-h-[390px]">
            <div class="swiper sample-slider1">
                <div class="swiper-wrapper">
            @foreach ($yanmanset as $fee)
            <div class="swiper-slide releative h-[390px] w-full">
                <a href="{{ $fee->url }}" class="link" id="{{$fee->id}}" target="_blank">
            <img
            class="max-h-[390px] min-h-[390px] object-center"
            src="{{ $fee->image }}" onerror="this.onerror=null;this.src='image/yoksa.png';"
            alt=""
          /></a>
          <div class="max-md:hidden absolute top-4 left-0 bg-white text-black px-2 py-1 font-bold text-xs oswald">SPOR</div>
          <div class="oswald absolute bottom-0 w-full bg-black/30 px-2 py-3">
            <div class="px-2"><span class="inline-flex items-center bg-orange-500 px-2 text-xs text-white ring-0"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:text-black">{{ $fee->category->ad }}</a></span></div>
             <div class="text-white px-2 py-1 font-semibold text-lg leading-6 py-1"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank"> {{ $fee->baslik }}</a>
             </div>
             <div class="text-xs font-bold px-2 text-white"><a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline text-white">{{ $fee->site?->ad }}</a> - <span class="text-white font-light"> {{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }} - <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline text-white">detaylar</a></span></div>
           </div>
        </div>
          @endforeach

        </div>
        <div class="swiper-button-next"><i class="fa-solid fa-angles-right"></i></div>
        <div class="swiper-button-prev"><i class="fa-solid fa-angles-left"></i></div>

      </div>
      <div class="swiper-scrollbar z-0 max-2xl:hidden"></div>
    </div>
     </div>
</div>

<div class="lg:mx-[170px] max-md:mx-4 md:mt-[30px] max-md:mt-4 max-md:mb-4">
    @foreach($fed->chunk(3) as $chunk)
    <div class="flex xl:flex-row flex-col w-full gap-4">
        @foreach ($chunk as $fee)
        <div class="relative xl:w-1/3">
            <a href="{{ $fee->url }}" class="link" id="{{$fee->id}}" target="_blank">
            <img
            class="max-h-[240px] min-h-[240px] w-full object-cover"
            src="{{ $fee->image }}" onerror="this.onerror=null;this.src='image/yoksa.png';"
            alt=""
          /></a>
          <div class="oswald absolute bottom-0 w-full bg-black/30 py-2">
            <div class="px-2"><span class="inline-flex items-center bg-orange-500 px-2 text-xs text-white ring-0"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:text-black">{{ $fee->category->ad }}</a></span></div>
             <div class="text-white px-2 py-1 font-semibold text-lg leading-6 py-1"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank"> {{ $fee->baslik }}</a>
             </div>
             <div class="text-xs font-bold px-2"><a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline text-white">{{ $fee->site?->ad }}</a> - <span class="text-white font-light">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }} - <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline text-white">detaylar</a></span></div>
           </div>

    </div>
    @endforeach
    </div>
    @endforeach
</div>

<div class="bg-gray-200 lg:mt-8 mx-4 lg:mx-[170px]">
    <div style="text-align:center;margin-bottom:10px;">
        <div style="
            max-width:970px;
            display:block;margin-left:auto;margin-right:auto;
            text-align: center;">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7405579499369683"
 crossorigin="anonymous"></script>
<!-- yatay72890 -->
<ins class="adsbygoogle"
 style="display:inline-block;width:970px;height:90px"
 data-ad-client="ca-pub-7405579499369683"
 data-ad-slot="2282302965"></ins>
<script>
 (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</div>


<div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row md:mt-[30px] gap-4">
<div class="w-full gap-4">
    <div class="flex justify-between items-center">
    <div class="oswald text-xl text-black font-bold">Gündem
        <hr class="my-1 border-orange-500 border w-16 mb-4">
    </div>

    <div class="oswald text-sm text-black"><hr class="my-1 border-orange-500 border w-16 mb-4">

    </div>
</div>
    @foreach($feeddd->chunk(4) as $chunk)
    <div class="flex flex-row max-xl:flex-wrap gap-4">
    @foreach ($chunk as $fee)
    <div class="flex flex-col w-full mb-4 border">
    <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[170px] max-h-[270px]">
        <a href="{{ $fee->url }}" class="" target="_blank"> <img src="{{ $fee->image }}" class="xl:h-[170px] h-[270px] min-w-full hover:scale-110 transition duration-500 object-cover" onerror="this.onerror=null;this.src='image/yoksa.png';"/></a>
    </div>
    <div class="flex justify-between">
        <div class="text-xs flex items-center px-2"><img src="{{ URL::asset('storage/logo/' .$fee->site?->logo) }}" class="h-6 w-6 mr-2" /> <a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline">{{ $fee->site?->ad }}</a>
        </div>
        <div class="flex text-xs items-center text-black">
            <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a>
            </div>
    </div>
    <div class="oswald flex grow px-1 text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank">{{ $fee->baslik }}</a></div>
    <div class="flex justify-between px-2 pb-3 text-gray700">
        <div class="text-xs"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:underline">{{ $fee->category->ad  }}</a> </div>
        <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }}
    </div>
    </div>
</div>
    @endforeach
</div>
    @endforeach
</div>

</div>

<div class="bg-gray-200 lg:mt-8 mx-4 lg:mx-[170px]">
    <div style="text-align:center;margin-bottom:10px;">
        <div style="
            max-width:970px;
            display:block;margin-left:auto;margin-right:auto;
            text-align: center;">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7405579499369683"
 crossorigin="anonymous"></script>
<!-- yatay72890 -->
<ins class="adsbygoogle"
 style="display:inline-block;width:970px;height:90px"
 data-ad-client="ca-pub-7405579499369683"
 data-ad-slot="2282302965"></ins>
<script>
 (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
</div>

<div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row md:mt-[30px] gap-4">
    <div class="w-full gap-4">
        <div class="flex justify-between items-center">
        <div class="oswald text-xl text-black font-bold">Ekonomi
            <hr class="my-1 border-orange-500 border w-16 mb-4">
        </div>

        <div class="oswald text-sm text-black"><hr class="my-1 border-orange-500 border w-16 mb-4">

        </div>
    </div>
        @foreach($feedddd->chunk(4) as $chunk)
        <div class="flex flex-row max-xl:flex-wrap gap-4">
        @foreach ($chunk as $fee)
        <div class="flex flex-col w-full mb-4 border">
        <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[170px] max-h-[270px]">
            <a href="{{ $fee->url }}" class="" target="_blank"> <img src="{{ $fee->image }}" class="xl:h-[170px] h-[270px] min-w-full hover:scale-110 transition duration-500 object-cover" onerror="this.onerror=null;this.src='image/yoksa.png';"/></a>
        </div>
        <div class="flex justify-between">
            <div class="text-xs flex items-center px-2"><img src="{{ URL::asset('storage/logo/' .$fee->site?->logo) }}" class="h-6 w-6 mr-2" /> <a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline">{{ $fee->site?->ad }}</a>
            </div>
            <div class="flex text-xs items-center text-black">
                <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a>
                </div>
        </div>
        <div class="oswald flex grow px-1 text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank">{{ $fee->baslik }}</a></div>
        <div class="flex justify-between px-2 pb-3 text-gray700">
            <div class="text-xs"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:underline">{{ $fee->category->ad  }}</a> </div>
            <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }}
        </div>
        </div>
    </div>
        @endforeach
    </div>
        @endforeach
    </div>

    </div>
    <div class="bg-gray-200 lg:mt-8 mx-4 lg:mx-[170px]">
        <div style="text-align:center;margin-bottom:10px;">
            <div style="
                max-width:970px;
                display:block;margin-left:auto;margin-right:auto;
                text-align: center;">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7405579499369683"
     crossorigin="anonymous"></script>
    <!-- yatay72890 -->
    <ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-7405579499369683"
     data-ad-slot="2282302965"></ins>
    <script>
     (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    </div>
    </div>

    <div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row md:mt-[30px] gap-4">
        <div class="w-full gap-4">
            <div class="flex justify-between items-center">
            <div class="oswald text-xl text-black font-bold">Spor
                <hr class="my-1 border-orange-500 border w-16 mb-4">
            </div>

            <div class="oswald text-sm text-black"><hr class="my-1 border-orange-500 border w-16 mb-4">

            </div>
        </div>
            @foreach($feeddddd->chunk(4) as $chunk)
            <div class="flex flex-row max-xl:flex-wrap gap-4">
            @foreach ($chunk as $fee)
            <div class="flex flex-col w-full mb-4 border">
            <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[170px] max-h-[270px]">
                <a href="{{ $fee->url }}" class="" target="_blank"> <img src="{{ $fee->image }}" class="xl:h-[170px] h-[270px] min-w-full hover:scale-110 transition duration-500 object-cover" onerror="this.onerror=null;this.src='image/yoksa.png';"/></a>
            </div>
            <div class="flex justify-between">
                <div class="text-xs flex items-center px-2"><img src="{{ URL::asset('storage/logo/' .$fee->site?->logo) }}" class="h-6 w-6 mr-2" /> <a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline">{{ $fee->site?->ad }}</a>
                </div>
                <div class="flex text-xs items-center text-black">
                    <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a>
                    </div>
            </div>
            <div class="oswald flex grow px-1 text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank">{{ $fee->baslik }}</a></div>
            <div class="flex justify-between px-2 pb-3 text-gray700">
                <div class="text-xs"><a href="{{ route('front.kategori',['cat' => $fee->category->slug]) }}" class="hover:underline">{{ $fee->category->ad  }}</a> </div>
                <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }}
            </div>
            </div>
        </div>
            @endforeach
        </div>
            @endforeach
        </div>

        </div>

        <div class="bg-gray-200 lg:mt-8 mx-4 lg:mx-[170px]">
            <div style="text-align:center;margin-bottom:10px;">
                <div style="
                    max-width:970px;
                    display:block;margin-left:auto;margin-right:auto;
                    text-align: center;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7405579499369683"
         crossorigin="anonymous"></script>
        <!-- yatay72890 -->
        <ins class="adsbygoogle"
         style="display:inline-block;width:970px;height:90px"
         data-ad-client="ca-pub-7405579499369683"
         data-ad-slot="2282302965"></ins>
        <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
        </div>
        </div>
</x-front.layout>
