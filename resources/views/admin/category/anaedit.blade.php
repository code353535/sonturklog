<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Kategori Güncelle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-3">
                                <form method="post" action="{{ route('admin.anacategoryupdate',['anacategory' => $anacategory]) }}">
                                    @csrf
                                    @method('put')

                                <div class="col-span-12 lg:col-span-6">

                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Ana Kategori Adı</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="ad" value="{{ $anacategory->ad }}" required>
                                        <x-input-error :messages="$errors->get('ad')" class="mt-2" />
                                    </div>
                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Ana Kategori Açıklaması</label>
                                        <textarea class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="aciklama" required>{{ $anacategory->aciklama }}</textarea>
                                        <x-input-error :messages="$errors->get('aciklama')" class="mt-2" />
                                    </div>
                                    <div class="mb-6">
                                        <button type="submit" rows="4" class="btn text-white bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600">Güncelle</button>
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
