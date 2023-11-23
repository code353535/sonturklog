<div x-data="{ Open: false }" class="max-md:sticky max-md:top-0 z-50 bg-white" x-cloak="false">
    <!-- header -->
<div class="flex flex-col lg:px-[170px] px-6 max-md:px-0">
    <div class="flex flex-row justify-between md:py-4 text-black text-xs py-2 max-md:px-4 border-gray-200 border-b-2">
        <!-- enüst sol -->
        <div class="text-xs flex">{{ $date = Carbon\Carbon::now()->translatedFormat('d-m-Y l') }} - Gündemi ve Blogları Takip Et.</div>
        <!-- enüst sağ -->
        <div class="text-xs flex max-md:hidden">
              <li class="relative px-2" type="none" >
                <a class="hover:text-orange-500 focus:orange-500" href="{{ route('sartlar') }}">
                    <i class="fa-solid fa-file-signature mr-1"></i>  Kulanım Şartları
                </a>
              </li>
              <li class="relative px-2" type="none" >
                <a class="hover:text-orange-500 focus:orange-500" href="{{ route('gizlilik') }}">
                    <i class="fa-solid fa-file-shield mr-1"></i> Gizlilik Politikası
                </a>
              </li>
              <li class="relative px-2" type="none" >
                <a class="hover:text-orange-500 focus:orange-500" href="{{ route('sss') }}">
                    <i class="fa-solid fa-circle-info mr-1"></i> Sık Sorulan Sorular
                </a>
              </li>
        </div>
    </div>
    <div class="flex justify-between max-lg:px-4">
    <div class="flex flex-row py-1 md:py-4">
        <div class="flex items-center waviy text-7xl max-md:text-5xl tracking-widest oswald">
            <span style="--i:1" class="font-black">T</span>
            <span style="--i:2" class="font-black">U</span>
            <span style="--i:3" class="font-black">R</span>
            <span style="--i:4" class="font-black">K</span>
            <span style="--i:5" class="font-black">L</span>
            <span style="--i:6" class="font-black">O</span>
            <span style="--i:7" class="font-black">G</span>
     </div>
     <span class="font-bold text-xl max-md:hidden -rotate-90 px-2">.NET</span>
    </div>
    <div class="flex flex-row items-center max-md:hidden">
        <div class="flex flex-row items-center px-2">

            <input type="email" name="email" id="email" class="w-96 p-2 border-gray-300 focus:border-orange-500 focus:ring-orange-500" placeholder="Ne aramıştın ..." required />
        </div>
        <div class="flex flex-row items-center px-2">
            <button type="submit" class="oswald w-full text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500">
                Ara</button>
        </div>
    </div>
</div>
    <div class="flex bg-black md:bg-white md:border-t-2 md:border-b-2 border-gray-200 py-2 text-sm font-medium text-white md:text-black items-center justify-between items-center max-h-[50px]">
        <div class="oswald flex flex-row items-center text-md max-md:hidden py-2 uppercase gap-2">
       <div><a href="/" class="{{ request()->routeIs('front.index') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">HABERLER</a></div>
       <div> <a href="{{ route('front.bloglar') }}" class="{{ request()->routeIs('front.bloglar') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">Bloglar</a></div>
       <div class="{{ !request()->routeIs('front.bloglar') ? 'hidden':'' }} "><x-front.kategoricanvas/></div>
    </div>

    <div class="md:hidden px-4 min-h-[50px] flex items-center text-md">
        <button @click=" Open = ! Open" type="submit" x-show="! Open"><i class="fa-solid fa-bars-staggered fa-xl text-white hover:text-orange-500"></i></button>
        <button @click=" Open = ! Open" type="submit" x-show="Open">
            <i class="fa-solid fa-xmark fa-xl text-white hover:text-orange-500 hover:rotate-90 transition ease-out duration-500"></i>
            </button>
    </div>
    <div class="flex px-4 lg:px-6 items-center text-md">
       <div class="px-2"> <x-front.bildirim/></div>
       <div class=""> @guest
        <x-front.guestusermenu/>
        @endguest
@auth
<x-front.authusermenu/>
@endauth
</div>
    </div>

    </div>
    <div class="{{ !request()->routeIs('front.index') ? 'hidden':'' }} oswald uppercase text-sm px-2 py-2 bg-black text-gray-100 max-md:hidden">
        @foreach ($anacategory as $anacat)
        <a href="{{ route('front.kategori',['cat' => $anacat->slug, 'cat' => $anacat->slug ]) }}" class="py-2 hover:text-orange-500 px-2">{{ $anacat->ad }}</a>
        @endforeach
    </div>

</div>
<!-- mobile navbar -->
<div class="mobile-navbar md:hidden">
    <!-- navbar wrapper -->

    <div x-cloak class="fixed left-0 w-full h-screen shadow-md top-25 bg-white py-4 mb-4"
    x-show="Open"
    x-transition:enter="transition origin-top ease-out duration-300"
    x-transition:enter-start="transform -translate-x-full opacity-0"
    x-transition:enter-end="transform translate-y-0 opacity-100"
    x-transition:leave="transition origin-top ease-in duration-300"
    x-transition:leave-start="transform -translate-y-0 opacity-100"
    x-transition:leave-end="transform -translate-x-full opacity-0"
        @click.away=" Open = false"
        >
        <div class="flex flex-col space-y-6">
@include('components.front.mobilmenu')

        </div>
    </div>
</div>
</div>
