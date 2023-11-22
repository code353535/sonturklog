<x-admin.layout>


    <div class="main-content">
        <div class="page-content">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-2 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Site Bilgilerini Güncelle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-2">
                                <form method="post" action="{{ route('admin.sitekaydet', ['site' => $site]) }}">
                                    @csrf
                                    @method('put')

                                <div class="grid grid-cols-4 gap-4 col-span-12 lg:col-span-6 mb-6">
                                    <div class="mb-4 col-span-2">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Site Adı</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="ad" value="{{ $site->ad }}" required>
                                        <x-input-error :messages="$errors->get('ad')" class="mt-2" />
                                    </div>
                                    <div class="mb-4 col-span-2">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Site Adresi</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="url" value="{{ $site->url }}" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-4 col-span-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Açıklama</label>
                                        <textarea row="4" class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="aciklama" required>{{ $site->aciklama }}</textarea>
                                        <x-input-error :messages="$errors->get('aciklama')" class="mt-2" />
                                    </div>
                                    <div class="mb-4 col-span-1">
                                        <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Onay Durumu</label>
                                        <select name="durum" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                            <option value="onaylandi" {{ $site->durum == 'onaylandi' ? 'selected' : '' }}>
                                                Onaylandi
                                            </option>
                                            <option value="reddedildi" {{ $site->durum == 'reddedildi' ? 'selected' : '' }}>
                                                Reddedildi
                                            </option>
                                            <option value="bekliyor" {{ $site->durum == 'bekliyor' ? 'selected' : '' }}>
                                                Bekliyor
                                            </option>
                                          </select>
                                    </div>
                                    <div class="mb-4 col-span-3">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Red Nedeni</label>
                                        <textarea row="4" class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="rednedeni">{{ $site->rednedeni }}</textarea>
                                        <x-input-error :messages="$errors->get('rednedeni')" class="mt-2" />
                                    </div>
                                    <div class="mb-6 col-span-1">
                                        <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Yayin Durumu</label>
                                        <select name="yayin" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                            <option value="aktif" {{ $site->yayin== 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="pasif" {{ $site->yayin == 'pasif' ? 'selected' : '' }}>
                                                Pasif
                                            </option>

                                          </select>
                                    </div>
                                    <div class="mb-4 col-span-1">
                                        <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Sahip Durumu</label>
                                        <select name="sahip" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                            <option value="aktif" {{ $site->sahip== 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="pasif" {{ $site->sahip == 'pasif' ? 'selected' : '' }}>
                                                Pasif
                                            </option>

                                          </select>
                                    </div>

                                    <div class="mb-4 col-span-2">
                                    <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">Kategori</label>
                                            <select name="anakategori" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                                @foreach ($anacategory as $anacategory)

                         <option value="{{ $anacategory->id }}" @selected($site->anacategory->id == $anacategory->id)>{{ $anacategory->ad }}
                        </option>
                        @endforeach
                                            </select>
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
