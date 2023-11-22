<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Talep Güncelle</h4>

                    </div>
                </div>


                <div class="grid">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                        <div class="card-body">
                            <div class="grid grid-cols-2">
                                <form method="post" action="{{  route('admin.destekupdate',['destek' => $destek]) }}">
                                    @csrf
                                    @method('put')

                                <div class="col-span-12 grid grid-cols-4 gap-4 lg:col-span-6">
                                    <div class="mb-6 col-span-1">
                                    <label for="example-text-input" class="block font-medium text-gray-700 mb-2">Durum</label>
                                    <select name="dstatus" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                                        <option value="aktif" {{ $destek->dstatus == 'aktif' ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="pasif" {{ $destek->dstatus == 'pasif' ? 'selected' : '' }}>
                                            Pasif
                                        </option>

                                      </select>
                                    </div>
                                    <div class="mb-6 col-span-3">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Mesaj</label>

                                        <textarea class="ckeditor form-control" name="dmesaj">{{ $destek->dmesaj }}</textarea>
                                    </div>
                                    <div class="mb-6 col-span-4">
                                        <label for="example-text-input" class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Cevap</label>

                                        <textarea class="ckeditor form-control" name="dcevap">{{ $destek->dcevap }}</textarea>
                                    </div>
                                    <div class="mb-6 col-span-4">
                                        <button type="submit" class="btn text-white bg-violet-500 border-violet-500 hover:bg-violet-600 hover:border-violet-600 focus:bg-violet-600 focus:border-violet-600 focus:ring focus:ring-violet-500/30 active:bg-violet-600 active:border-violet-600">Güncelle</button>
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
