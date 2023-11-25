<x-front.layout>


    <div class="lg:mx-[170px] max-md:mx-4 flex flex-col xl:flex-row gap-4 mt-6">
        <div class="w-full gap-4">
            @if(count($duyuru) > 0)

            @foreach($duyuru->chunk(4) as $chunk)
            <div class="flex flex-row max-xl:flex-wrap gap-4">

            @foreach ($chunk as $fee)

            <div class="flex flex-col w-full mb-4 border">

            <div class="flex justify-between">
                <div class="text-xs flex items-center px-2"><img src="{{ URL::asset('storage/logo/' .$fee->site?->logo) }}" class="h-6 w-6 mr-2" /> <a href="{{ $fee->site?->url}}" target="_blank" class="hover:underline">{{ $fee->site?->ad }}</a>
                </div>
                <div class="flex text-xs items-center">
                    <a href="{{route('front.detaylar',['id' => $fee->id, 'slug' =>  Str::slug($fee->baslik)])}}" target="_blank" class="hover:underline pr-2">detaylar</a>
                    </div>
            </div>
            <div class="oswald flex grow px-1 text-lg font-bold pb-3 py-2 px-2"><a href="{{ $fee->url }}" id="{{$fee->id}}" class="link hover:underline" target="_blank">{{ $fee->baslik }}</a></div>
            <div class="flex justify-between px-2 pb-3 text-gray700">
                <div class="text-xs"><a href="" class="hover:underline">{{ $fee->category->ad  }}</a> </div>
                <div class="flex text-xs items-center">{{ \Carbon\Carbon::parse($fee->pubdate)->diffForHumans() }}
            </div>
            </div>
        </div>
            @endforeach

        </div>
            @endforeach
            {{ $duyuru->links() }}

            @else
            <div class="flex justify-center">Kayıt bulunamadı</div>
            @endif
        </div>

        </div>


</x-front.layout>
