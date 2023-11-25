<x-front.layout>

    <div class="lg:mx-[170px] md:mt-4">
        <div class="flex flex-col lg:flex-row bg-black w-full">
<div class="flex basis-1/2 w-full">
    <div class="flex justify-center items-center releative w-full min-h-[350px]">
    <img
    class="md:px-4 md:py-4 min-h-[350px]"
    src="{{ $detay->image }}"
    onerror="this.onerror=null;this.src='image/yoksa.png';"
  />
  <div class="absolute z-40 bg-gradient-to-t from-black via-black to-black w-full"></div>
</div>

</div>
<div class="flex basis-1/2 flex-col">
    <div class="flex justify-between py-4 text-white px-4">
        <div class="text-xs"><a href="" class="hover:underline">{{ $detay->category->ad  }}</a> </div>
        <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($detay->pubdate)->diffForHumans() }}
    </div>
    </div>
      <div class="text-white px-4 font-semibold text-3xl py-4 oswald"> {{ $detay->baslik }}</div>
      <div class="text-white px-4 text-sm"> {{ $detay->aciklama }}</div>
      <div class="text-white px-4 py-6 font-semibold text-md">İçeriğin tamamı için <a href="{{ $detay->url }}" id="{{$detay->id}}" class="link hover:underline" target="_blank"> {{ $detay->site?->ad }}</a></div>
</div>
</div>

</div>
</x-front.layout>
