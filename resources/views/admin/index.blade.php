<x-admin.layout>

    <div class="main-content ">
        <div class="page-content dark:bg-zinc-700">
            <div class="container-fluid px-[0.625rem]">

                <div class="grid grid-cols-1 mb-5">
                    <div class="flex items-center justify-between">
                        <h4 class="mb-sm-0 text-lg font-semibold grow text-gray-800 dark:text-gray-100">Dashboard</h4>
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="#" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-500 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Dashboard</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Onay Bekleyen</span>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                            <span class="counter-value" data-target="865.2">{{ $site }}</span>
                                            site
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Toplam Kayıtlı</span>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                            <span class="counter-value" data-target="865.2">{{ $topsite }}</span>
                                            site
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Toplam Kategori</span>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">

                                            <span class="counter-value" data-target="865.2">{{ $feedtop }}</span>
                                            kategori
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card  dark:bg-zinc-800 dark:border-zinc-600">
                        <div class="card-body">
                            <div>
                                <div class="grid grid-cols-12 gap-5 items-center">
                                    <div class="col-span-6">
                                        <span class="text-gray-700 dark:text-zinc-100">Toplam Yayın</span>
                                        <h4 class="my-4 text-xl text-gray-800 dark:text-gray-100 ">
                                            <span class="counter-value" data-target="865.2">{{ $bottop }}</span>
                                            yayın
                                        </h4>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </x-admin.layout>

