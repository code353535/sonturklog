<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Feed Kategori Güncelle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-3">
                                <form method="post" action="{{ route('admin.feedupdate', ['feed' => $feed]) }}">
                                    @csrf
                                    @method('put')

                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mb-6">
                                        <label class="block font-medium text-gray-700 dark:text-zinc-100 mb-2">Kategori</label>
                                        <select name="kategori" class="dark:bg-zinc-800 dark:border-zinc-700 w-full rounded border-gray-100 py-2.5 text-sm text-gray-500 focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:text-zinc-100">
                                            @foreach ($category as $category)

                     <option value="{{ $category->id }}" @selected($feed->category->id == $category->id)>{{ $category->ad }}
                    </option>
                    @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-6">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Kategori Linki</label>
                                        <input class="w-full rounded border-gray-100 placeholder:text-sm focus:border focus:border-violet-500 focus:ring-0 dark:bg-zinc-700/50 dark:border-zinc-600 dark:placeholder:text-zinc-100 dark:text-zinc-100" type="text" name="katlink" value="{{ $feed->katlink }}" required>
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
