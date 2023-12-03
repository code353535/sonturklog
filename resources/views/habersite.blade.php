<x-front.layout>
    <div class="lg:mx-[170px] flex justify-center oswald">
<div class=" flex items-center py-6 mx-auto font-bold text-xl text-black">Haber Siteleri</div>
</div>


    <div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row gap-4 mt-6">
        <div class="w-full gap-4">
            @if(count($habersite) > 0)

            @foreach($habersite->chunk(4) as $chunk)
            <div class="flex flex-row max-xl:flex-wrap gap-4">

            @foreach ($chunk as $fee)

            <div class="flex flex-col w-full mb-4 border">
            <div class="flex flex-col mb-2 overflow-hidden xl:max-h-[170px] max-h-[270px]">
                <a href="{{ $fee->url }}" class="" target="_blank"> <img src="{{ URL::asset('storage/logo/' .$fee->logo) }}" class="xl:h-[170px] h-[270px] min-w-full hover:scale-110 transition duration-500 object-cover" alt=""/></a>
            </div>

            <div class="oswald flex grow px-1 text-lg font-bold pb-3 px-2"><a href="{{ $fee->url }}" class="hover:underline" target="_blank">{{ $fee->ad }}</a></div>

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
