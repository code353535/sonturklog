<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Kullanıcı Listesi</h4>

                    </div>
                </div>
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                            <div class="card-body relative overflow-x-auto">
                                <table id="datatable" class="table w-full pt-4 text-slate-900 dark:text-zinc-100">
                                    <colgroup>
                                        <col span="1" style="width: 5%;">
                                        <col span="1" style="width: 25%;">
                                        <col span="1" style="width: 25%;">
                                        <col span="1" style="width: 25%;">
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 10%;">

                                     </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">İd</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Kategori Adı</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Slug</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Açıklama</th>

                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anacategory as $anacategory )
                                        <tr>
                                            <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600">{{ $anacategory->id }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $anacategory->ad }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $anacategory->slug }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $anacategory->aciklama }}</td>


                                            <td class="flex p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">

                                                <a href="{{ route('admin.anacategoryedit',['anacategory' => $anacategory]) }}" type="button" class="btn mr-2 text-white bg-yellow-500 border-yellow-500 hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <form method="post" action="{{ route('admin.anacategorydestroy',['anacategory' => $anacategory]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn text-white bg-red-500 border-red-500 hover:bg-red-600 hover:border-red-600 focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-500/30 active:bg-red-600 active:border-red-600"><i class="fa-regular fa-trash-can"></i></button>

                                           </form>

                                         </td>

                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>


    </x-admin.layout>
