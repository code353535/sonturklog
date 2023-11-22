<div>
@if ($message = Session::get('success'))
<x-toastb/>
@endif
@if ($message = Session::get('error'))
<x-toasth/>
@endif
<div class="flex flex-col justify-center items-center inline-block pt-10">
    <div class="oswald text-4xl font-medium">SİTE AYARLARI</div>
    <div class="roboto text-sm text-gray-500 mt-1">
        Site bilgilerinizi düzenleyin.
    </div>
</div>
<hr class="lg:mx-[170px] my-6 border border-gray-200">
<div class="roboto flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">

<x-front.profilnavbar/>

<div class="basis-2/3 flex flex-col-reverse xl:flex-row">

<div class="md:w-[620px] px-4 py-4 border">
    @if($say < 5 || auth::user()->role =='admin')
    <form wire:submit="store">
        @csrf
           <div class="grid grid-cols-5 gap-2 mt-6">
            <div class="col-span-2">
            <label for="kategori" class="block text-sm font-medium text-gray-900 dark:text-white mb-1">Kategori</label>
            <select wire:model="kategori" class=" mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                <option selected>Kategori Seçin</option>
                @foreach ($category as $cat)
     <option value="{{ $cat->id }}">{{ $cat->ad }}</option>
    @endforeach
    </select>
    <span class="text-rose-500 mt-2 text-sm">@error('kategori'){{ $message }}@enderror</span>
</div>
                <div class="col-span-2">
                    <x-input-label for="katlink" :value="__('Kategori Linki')" />
                    <input type="url" class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500" wire:model="katlink" />
                    @error('katlink') <span class="text-rose-500 mt-2 text-sm">{{ $message }}</span>@enderror
                </div>

                <div class="col-span-1 mt-6 ml-2 mb-6">
                    <button type="submit" class="oswald flex items-center text-black focus:ring-0 focus:outline-none font-medium text-md px-6 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500">
                        <svg aria-hidden="true" wire:loading wire:target="store" role="status" class="inline w-4 h-4 mr-3 text-orange-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                        Ekle</button>
                </div>
            </div>
        </form>
        @else
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Oops!</span> Link ekleme limitiniz doldu. Her site için en fazla 5 link eklenebilir.

            </div>
          </div>
        @endif
        <div class="relative overflow-x-auto mt-6">
            <table class="w-full text-sm text-left">
                @if($say >= 1)
                <thead>
                  <tr class="bg-orange-500">
                    <th class="w-1/6 px-4 py-3">Sil</th>
                    <th class="w-1/6 px-2 py-3">Kategori</th>
                    <th class="w-3/6 px-2 py-3">Link</th>
                    <th class="w-1/6 px-2 py-3">Yayinda</th>
                  </tr>
                </thead>
                @endif
                @foreach ($feed as $fe)
                <tbody>
                  <tr class="border-b bg-gray-50">
                    <td class="px-2 py-4">

                        <style>
                            [x-cloak] { display: none }
                            </style>
                        <div x-data="{ modelOpen: false }" class="flex">
                            <button @click="modelOpen =!modelOpen" wire:click="feedsilmek({{$fe->id}})" class="w-full flex items-center justify-start block px-2 py-2">

                                <i class="fa-solid fa-trash-can mr-2"></i>
                            </button>

                            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-end justify-center md:min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = true" x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60" aria-hidden="true"
                                    ></div>

                                    <div x-cloak x-show="modelOpen"
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-md p-6 my-16 md:my-20 overflow-hidden text-left transition-all transform bg-white shadow-xl xl:max-w-xl"
                                    >
                                        <div class="flex items-center justify-between space-x-4">
                                            <h1 class="text-xl font-bold text-gray-800 ">Kaydı silmek istediğine emin misin?</h1>


                                        </div>

                                        <p class="mt-2 text-md text-gray-800 ">
                                              Devam ederseniz bu kaydı kalıcı olarak sileceksiniz. Devam etmek istediğinize emin misiniz?
                                        </p>


                                            <div class="flex justify-end mt-6">
                                                <button for="show"
                                                @click="modelOpen = false" type="button" class="mr-2 px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-500 hover:bg-gray-600 shadow-md">
                                                    Vazgeç
                                                </button>
                                                <button for="show"
                                                @click="modelOpen = false" wire:click="feedsil()" type="submit" class="px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 hover:bg-red-600 shadow-md">
                                                    Kaydı Sil
                                                </button>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-2 py-4">{{ $fe->category->ad}} </td>
                    <td class="px-2 py-4">{{ $fe->katlink }}</td>

                    <td class="px-2 py-4"><span class="font-bold">{{ $fe->bot_count }}</span> aktif</td>
                  </tr>

                </tbody>
                @endforeach
              </table>
        </div>
</div>
<div class="flex flex-col  md:ml-6 xl:w-[200px]">
<div class="oswald px-4 py-4 bg-white border text-black font-bold text-xl"><i class="fa-solid fa-plus mr-2"></i>Yayın Ekle</div>
        <div class="px-4 py-4 bg-white border font-bold text-xl text-black max-md:hidden"> Limit : {{ $say }} / 5</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Link adresi https:// ile başlayan tam erişim adresi olmalıdır.</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Yayında bölümünde, ilgili linkte taranan ve gösterime girmiş konu sayısını görebilirsiniz.</div>
    </div>
</div>
</div>

</div>
