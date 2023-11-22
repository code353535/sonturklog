
<div x-data="{dropdownMenu: false}" class="relative" x-cloak="false">
    <!-- Dropdown toggle button -->
    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center p-2">
        <i class="fa-solid fa-ellipsis fa-lg"></i>
    </button>
    <!-- Dropdown list -->
    <div x-show="dropdownMenu" class="z-40 w-48 absolute right-2 top-8 bg-white shadow-md shadow-slate-500/30 w-[170px]"
    x-show="Open"
    x-transition:enter="transition duration-300" x-transition:enter-start="transform opacity-0 translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-300 translate-y-4" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-4"
        @click.away=" dropdownMenu = false"
    >
    <div class="px-2 py-1 text-black oswald">
    <ul class="py-2 text-sm font-medium" aria-labelledby="avatarButton">
        <li>
          <a href="{{route('feed.ekle',['id' => $site->id])}}" class="block px-4 py-2 text-black hover:text-orange-500"><i class="fa-solid fa-clapperboard mr-2"></i>Yayin Ayarları</a>
        </li>
        <li>
            <li>
                <a href="{{route('site.edit',['id' => $site->id])}}" class="block px-4 py-2 text-black hover:text-orange-500"><i class="fa-solid fa-pen-to-square mr-2"></i>Düzenle</a>
              </li>
              <li>
            <style>
                [x-cloak] { display: none }
                </style>
            <div x-data="{ modelOpen: false }" class="flex">
                <button @click="modelOpen =!modelOpen" class="w-full flex items-center justify-start block px-4 py-2 text-black hover:text-orange-500">

                    <i class="fa-solid fa-trash-can mr-2"></i>Siteyi Sil
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
                            <form method="post" action="{{route('site.sil')}}" class="px-6">
                                @csrf
                                @method('delete')
                                <x-text-input name="id" type="hidden" value="{{ $site->id }}" />

                                <div class="flex justify-end mt-6">
                                    <button for="show"
                                    @click="modelOpen = false" type="button" class="mr-2 px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-500 hover:bg-gray-600 shadow-md">
                                        Vazgeç
                                    </button>
                                    <button for="show"
                                    @click="modelOpen = false" type="submit" class="px-2 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 hover:bg-red-600 shadow-md">
                                        Kaydı Sil
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    </div>
