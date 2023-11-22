<x-front.layout>

    @if ($message = Session::get('success'))
    <x-toastb/>
    @endif
    @if ($message = Session::get('error'))
    <x-toasth/>
    @endif


    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-bold">DESTEK TALEPLERİ</div>
        <div class="text-sm text-gray-500 mt-1">
            Sorularınız ve sorunlarınız için bize yazın.
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">
    <div class="flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">

        <x-front.profilnavbar/>

    <div class="basis-2/3 flex flex-col-reverse xl:flex-row">
        <div class="md:w-[600px] px-4 py-4 border">
            @if(count($destek) > 0)
            <table class="w-full text-sm text-left">

                <thead>
                  <tr class="bg-orange-500">

                    <th class="w-1/4 px-2 py-3">Kategori</th>
                    <th class="w-2/4 px-2 py-3">Baslik</th>
                    <th class="w-1/4 px-2 py-3">Durum</th>

                  </tr>
                </thead>

                @foreach ($destek as $destek)
                <tbody>
                  <tr class="border-b bg-white">
                    <td class="px-2 py-4">{{ $destek->dkategori }}</td>
                @if($destek->dstatus == 'aktif')
                    <td class="px-2 py-4 font-bold"><a href="{{ route('site.destekdetay',['id' => $destek->id ]) }}" class="hover:underline">{{ $destek->dbaslik }} </a></td>
                    @else
                    <td class="px-2 py-4 font-bold"><a href="{{ route('site.destekkap',['id' => $destek->id ]) }}" class="hover:underline">{{ $destek->dbaslik }} </a></td>
                    @endif
                    <td class="px-2 py-4"><span class="font-bold">
                            @if($destek->dstatus == 'aktif')
                           <div class="text-green-500">Açık</div>
                            @else
                            <div class="text-gray-400">Kapalı</div>
                            @endif
                    </td>
                  </tr>

                </tbody>
            @endforeach
              </table>
            @else
<div class="flex justify-center py-4">Bir biletiniz bulunmuyor.</div>
              @endif
            </div>
              <div class="flex flex-col  md:ml-6 xl:w-[220px]">
                <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-envelope mr-2"></i>Biletlerim</div>
                <div class="px-4 py-4 bg-white border text-black max-md:hidden">Biletlerinizin cevaplanması, yoğunluğa bağlı olarak bazı durumlarda 24 saat sürebilir. </div>
                </div>
        </div>
    </div>



    </x-front.layout>
