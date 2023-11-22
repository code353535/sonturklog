<x-admin.layout>

    <div class="main-content">
        <div class="page-content dark:bg-zinc-700">

            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-xl font-semibold grow text-gray-800 dark:text-gray-100">Feed Link Listesi</h4>

                    </div>
                </div>
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12">
                        <div class="card dark:bg-zinc-800 dark:border-zinc-600">

                            <div class="card-body relative overflow-x-auto">
                                <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100">
                                    <colgroup>

                                        <col span="1" style="width: 25%;">
                                        <col span="1" style="width: 25%;">
                                        <col span="1" style="width: 40%;">
                                        <col span="1" style="width: 10%;">
                                     </colgroup>
                                    <thead>
                                        <tr>

                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Başlık</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Url</th>
                                            <th class="p-4 pr-8 border border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Resim Linki</th>

                                            <th class="p-4 pr-8 border rtl:border-l border-y-2 border-gray-50 dark:border-zinc-600 border-l-0">Düzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bot as $bot )
                                        <tr>

                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $bot->baslik}}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $bot->url}}</td>
                                            <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">{{ $bot->image}}</td>

                                            </td>
                                            <td class="flex p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">
                                                <form method="post" action="{{route('admin.botdestroy',['bot' => $bot])}}">
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
