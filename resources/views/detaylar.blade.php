<x-front.layout>

    <div class="lg:mx-[170px] md:mt-4">
        <div class="flex flex-col lg:flex-row bg-black w-full">
<div class="flex basis-1/2 w-full">
    <div class="flex justify-center items-center releative w-full min-h-[350px]">
    <img
    class="md:px-4 md:py-4 min-h-[350px]"
    src="{{ $detay->image }}"
  />
  <div class="absolute z-40 bg-gradient-to-t from-black via-black to-black w-full"></div>
</div>

</div>
<div class="flex basis-1/2 flex-col">
    <div class="flex justify-between py-4 text-white px-4">
        <div class="text-xs">{{ $detay->category->ad  }}</div>
        <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($detay->pubdate)->diffForHumans() }}
    </div>
    </div>
      <div class="text-white px-4 font-semibold text-3xl py-4 oswald"> {{ $detay->baslik }}</div>
      <div class="text-white px-4 text-sm"> {{ $detay->aciklama }}</div>
      <div class="text-white px-4 py-6 font-semibold text-md">İçeriğin tamamı için <a href="{{ $detay->url }}" id="{{$detay->id}}" class="link hover:underline" target="_blank"> {{ $detay->site?->ad }}</a></div>
</div>
</div>

</div>

<div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row gap-4 mt-6">

    <div class="w-full gap-4">
        <div class="oswald text-MD text-black font-bold uppercase">Bunlarda İlgini Çekebilir</div>
        <hr class="my-1 border-orange-500 border w-16 mb-3">
        @if(count($kategori) > 0)

        @foreach($kategori->chunk(4) as $chunk)
        <div class="flex flex-row max-xl:flex-wrap gap-4">

        @foreach ($chunk as $fee)

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

        @else
        <div class="flex justify-center">Kayıt bulunamadı</div>
        @endif
    </div>

    </div>
</x-front.layout>
