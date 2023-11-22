<x-admin.layout>


    <div class="main-content">
        <div class="page-content">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-2 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Site Ekle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-2">
                                <form method="post" action="{{ route('admin.siteeklekaydet') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                <div class="grid grid-cols-4 gap-4 col-span-12 lg:col-span-6 mb-6">
                                    <div class="mb-4 col-span-2">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Site Adı</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="ad" required>
                                        <x-input-error :messages="$errors->get('ad')" class="mt-2" />
                                    </div>
                                    <div class="mb-4 col-span-2">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Site Adresi</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="url" required>
                                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                                    </div>
                                    <div class="mb-4 col-span-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Açıklama</label>
                                        <textarea row="4" class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="aciklama" required></textarea>
                                        <x-input-error :messages="$errors->get('aciklama')" class="mt-2" />
                                    </div>

                                    <div class="mb-4 col-span-2">
                                    <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">Kategori</label>
                                            <select name="anakategori" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                <option selected>Kategori Seçin</option>
                                                @foreach ($anacategory as $anacategory)
                                     <option value="{{ $anacategory->id }}">{{ $anacategory->ad }}</option>
                                    @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('anakategori')" class="mt-2" />
                                        </div>

                                        <div class="mb-4 col-span-2">

                                        <label class="block mb-2 text-sm font-medium text-gray-900" for="large_size">Site Logosu</label>
                                        <input class="file:bg-sky-950 file:text-amber-500 file:text-md file:border-0 block w-full text-md text-slate-800 border rounded-md border-gray-300 rounded-lg cursor-pointer file:rounded-md py-1 focus:outline-none focus:ring-amber-400 focus:border-amber-400" id="logo" type="file" name="logo">
                                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                    </div>

                                    <div class="mb-6">
                                        <button type="submit" rows="4" class="btn  text-white bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600">Güncelle</button>
                                    </div>

                                </div>
                            </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-admin.layout>
