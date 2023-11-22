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


            <form method="post" action="{{ route('site.destekedit',['id' => $detay->id]) }}" enctype="multipart/form-data">
                @csrf
                   <div class="grid grid-cols-5 gap-2 mt-6">
                    <div class="col-span-5">
                    <label for="dkategori" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Destek Kategorisi</label>
                    <x-text-input type="text" name="dbaslik" class="mt-1 block w-full mb-2" value="{{ $detay->dkategori }}" disabled/>
            <span class="text-rose-500 mt-2 text-sm">@error('dkategori'){{ $message }}@enderror</span>
        </div>
                        <div class="col-span-5 mt-4 overflow-auto">
                            <x-input-label for="dbaslik" :value="__('Mesaj Başlığı')" />
                            <x-text-input type="text" name="dbaslik" class="mt-1 block w-full mb-2" value="{{ $detay->dbaslik }}" disabled/>
                            @error('dbaslik') <span class="text-rose-500 mt-2 text-sm">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-span-5 mt-4">
                            <x-input-label for="dbaslik" :value="__('Mesajınız')" />
                        <textarea class="ckeditor form-control" name="dmesaj">{{ $detay->dmesaj }}</textarea>
                        @error('dmesaj') <span class="text-rose-500 mt-2 text-sm">{{ $message }}</span>@enderror
                    </div>

                        <div class="col-span-5 mt-6 mb-6 place-self-end">
                            <button type="submit" class="oswald text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500">

                                Gönder</button>
                        </div>
                    </div>
                </form>



    </div>
    <div class="flex flex-col  md:ml-6 xl:w-[220px]">
        <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-envelope mr-2"></i>Bilet Güncelle</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Biletini henüz cevaplanmamış. Dilerseniz mesajınızı güncelleye bilirsiniz.</div>
    </div>
    </div>
</div>


    </x-front.layout>
