<x-front.layout>
    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-bold">HABER KAYNAKLARI</div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">

    <div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row mt-6">
        <div class="w-full">
            @if(count($habersite) > 0)

            @foreach($habersite->chunk(5) as $chunk)
            <div class="flex flex-row max-xl:flex-wrap md:gap-8 md:mb-4">

            @foreach ($chunk as $fee)

            <div class="flex flex-col w-full mb-4 border md:bg-gray-100 md:shadow-sm md:shadow-slate-500/50 px-4 py-4">
            <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[150px] max-h-[150px] max-md:hidden">
                <a href="{{ $fee->url }}" class="float-left" target="_blank"> <img src="{{ URL::asset('storage/logo/' .$fee->logo) }}" class="xl:h-[150px] h-[150px] min-w-full hover:scale-110 transition duration-500 object-cover" alt=""/></a>
            </div>

            <div class="oswald flex grow px-1 text-2xl md:text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" class="hover:underline" target="_blank">{{ $fee->ad }}</a></div>

        </div>
            @endforeach

        </div>
            @endforeach

            @else
            <div class="flex justify-center">Kayıt bulunamadı</div>
            @endif
        </div>

        </div>
        <div class="flex items-center justify-center lg:mt-8 px-4 mx-4 lg:mx-[170px]">
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
