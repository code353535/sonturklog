<!-- leftbar-tab-menu -->
<nav class="border-b border-slate-100 dark:bg-zinc-800 print:hidden flex items-center fixed top-0 right-0 left-0 bg-white z-10 dark:border-zinc-700">

    <div class="flex items-center justify-between w-full">
        <div class="topbar-brand flex items-center">
            <div class="navbar-brand flex items-center justify-between shrink px-5 h-[70px] border-r bg-white border-r-gray-50 dark:border-zinc-700 dark:bg-zinc-800">
                <a href="#" class="flex items-center font-bold text-lg  dark:text-white">
                    <img src="assets/images/logo-sm.svg" alt="" class="ltr:mr-2 rtl:ml-2 inline-block mt-1 h-6" />
                    <span class="hidden xl:block align-middle"> Turklog Admin</span>
                </a>
            </div>
            <button type="button" class="text-gray-600 dark:text-white h-[70px] ltr:-ml-10 ltr:mr-6 rtl:-mr-10 rtl:ml-10 vertical-menu-btn" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <form class="app-search hidden xl:block px-5">
                <div class="relative inline-block">
                    <input type="text" class="bg-gray-50/30 dark:bg-zinc-700/50 border-0 rounded focus:ring-0 placeholder:text-sm px-4 dark:placeholder:text-gray-200 dark:text-gray-100 dark:border-zinc-700 " placeholder="Ara...">
                    <button class="py-1.5 px-2.5 text-white bg-violet-500 inline-block absolute ltr:right-1 top-1 rounded shadow shadow-violet-100 dark:shadow-gray-900 rtl:left-1 rtl:right-auto" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
        </div>
        <div class="flex items-center">

            <div>
                <div class="dropdown relative sm:hidden block">
                    <button type="button" class="text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 dropdown-toggle" data-dropdown-toggle="navNotifications">
                        <i data-feather="search" class="h-5 w-5"></i>
                    </button>

                    <div class="dropdown-menu absolute px-4 -left-36 top-0 mx-4 w-72 z-50 hidden list-none border border-gray-50 rounded bg-white shadow dark:bg-zinc-800 dark:border-zinc-600 dark:text-gray-300" id="navNotifications">
                        <form class="py-3 dropdown-item" aria-labelledby="navNotifications">
                            <div class="form-group m-0">
                                <div class="flex w-full">
                                    <input type="text" class="border-gray-100 dark:border-zinc-600 dark:text-zinc-100 w-fit" placeholder="Search ..." aria-label="Search Result">
                                    <button class="btn btn-primary border-l-0 rounded-l-none bg-violet-500 border-transparent text-white" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div>
                <button type="button" class="light-dark-mode text-xl px-4 h-[70px] text-gray-600 dark:text-gray-100 hidden sm:block ">
                    <i data-feather="moon" class="h-5 w-5 block dark:hidden"></i>
                    <i data-feather="sun" class="h-5 w-5 hidden dark:block"></i>
            </div>
            <div>
                <div class="dropdown relative ltr:mr-4 rtl:ml-4">
                    <button type="button" class="flex items-center px-4 py-5 border-x border-gray-50 bg-gray-50/30 dropdown-toggle dark:bg-zinc-700 dark:border-zinc-600 dark:text-gray-100" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img class="h-8 w-8 rounded-full ltr:xl:mr-2 rtl:xl:ml-2" src="{{ asset('photo/'.Auth::user()->photo) }}" alt="Header Avatar">
                        <span class="fw-medium hidden xl:block">{{ Auth::user()->name }}</span>
                        <i class="mdi mdi-chevron-down align-bottom hidden xl:block"></i>
                    </button>
                    <div class="dropdown-menu absolute top-0 ltr:-left-3 rtl:-right-3 z-50 hidden w-40 list-none rounded bg-white shadow dark:bg-zinc-800" id="profile/log">
                        <div class="border border-gray-50 dark:border-zinc-600" aria-labelledby="navNotifications">
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="px-3 py-2 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="/profile">
                                    <i class="mdi mdi-face-man text-16 align-middle mr-1"></i> Profil
                                </a>
                            </div>
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="px-3 py-2 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="lock-screen.html">
                                    <i class="mdi mdi-lock text-16 align-middle mr-1"></i> Ekranı Kilitle
                                </a>
                            </div>
                            <hr class="border-gray-50 dark:border-gray-700">
                            <div class="dropdown-item dark:text-gray-100">
                                <a class="p-3 hover:bg-gray-50/50 block dark:hover:bg-zinc-700/50" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout text-16 align-middle mr-1"></i> Çıkış yap
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>



<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu rtl:right-0 fixed ltr:left-0 bottom-0 top-16 h-screen border-r bg-white border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700 z-10">

    <div data-simplebar class="h-full">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-heading px-4 py-3.5 text-xs font-medium text-gray-500 cursor-default" data-key="t-menu">Menu</li>

                <li>
                    <a href="/admin" class="pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"> Ana Sayfa</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false" class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps"> Kategori</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.anacategorylist') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Ana Kategori Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.anacategoryadd') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Ana Kategori Ekle</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categorylist') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Kategori Listesi</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categoryadd') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Kategori Ekle</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" aria-expanded="false"  class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="users"></i>
                        <span data-key="t-auth">Kullanıcılar</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.userlist') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Kullanıcı Listesi</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" aria-expanded="false"  class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="users"></i>
                        <span data-key="t-auth">Destek</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.desteklist') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Destek Listesi</a>
                        </li>

                    </ul>
                </li>

                 <li>
                    <a href="javascript: void(0);" aria-expanded="false" class="nav-menu pl-6 pr-4 py-3 block text-sm font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i data-feather="file-text"></i><span data-key="t-pages">Siteler</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('admin.siteekle') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Site Ekle</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.sitelist') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Tüm Siteler</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.onayli') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Onaylı Siteler</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.onaybekleyen') }}" class="pl-14 pr-4 py-2 block text-[13.5px] font-medium text-gray-700 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Onay Bekleyenler</a>
                        </li>

                    </ul>
                </li>






        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
