<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Tüm Sitelerin Listesi</h4>

                    </div>
                </div>
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                            <div class="card-body relative overflow-x-auto">
                                <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                    <thead>
                                        <tr>
                                            <th class="p-4 pr-8 border rtl:border-l-0 border-y-2 border-gray-50 dark:border-zinc-600">İd</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Site Adı</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Url Adresi</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Kategori</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Üye Email</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Logo</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Onay Durumu</th>
                                            <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Yayın Durumu</th>
                                            <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Sahiplik Doğrulaması</th>
                                            <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Tarih</th>
                                            <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($site as $site )
                                        <tr>
                                            <td class="p-4 pr-8 border rtl:border-l-0 border-t-0 border-gray-50 dark:border-zinc-600">{{ $site->id }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $site->ad }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $site->url }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $site->anacategory->ad }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $site->user->email }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"> <img src="{{ asset('storage/logo/'.$site->logo) }}" class="shadow-sm rounded-full shadow-slate-500/40" width="70" height="75" alt="Avatar" /></td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"> {{ $site->durum }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"> {{ $site->yayin }}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"> {{ $site->sahip}}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600"> {{ $site->created_at}}</td>
                                            </td>
                                            <td class="flex p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">
                                                <a href="{{ route('admin.siteupdate',['site' => $site]) }}" type="button" class="btn mr-2 text-white bg-yellow-500 border-yellow-500 hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{ route('admin.feedlist',['site' => $site]) }}" type="button" class="btn mr-2 text-white bg-yellow-500 border-yellow-500 hover:bg-yellow-600 hover:border-yellow-600 focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-500/30 active:bg-yellow-600 active:border-yellow-600"><i class="fa-solid fa-rss"></i></a>
                                                <form method="post" action="{{route('adminsite.sitedestroy',['site' => $site])}}">
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
