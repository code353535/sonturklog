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
            <div class="font-bold">Turklog :</div>
            <div class="px-4 py-4 mt-4 bg-gray-100">
                {!! $kap->dcevap !!}
          </div>
          <div class="font-bold mt-4">Mesajınız :</div>
          <div class="px-4 py-4 mt-4 bg-gray-100">
              {!! $kap->dmesaj !!}
        </div>


    </div>
    <div class="flex flex-col  md:ml-6 xl:w-[220px]">
        <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-envelope mr-2"></i>Bilet Detayı</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Bu bilet, cevaplanmış ve kapatılmış. 10 gün sonra silinecektir.</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Sorunuza tatmin edici bir cevap alamadıysanız, lütfen yeni bir bilet oluşturun.</div>
    </div>
    </div>
    </div>



    </x-front.layout>
