<div x-data="{ Open: false }" class="max-md:sticky max-md:top-0 z-50 bg-white" x-cloak="false">
    <!-- header -->
<div class="flex flex-col lg:px-[170px] px-6 max-md:px-0">

    <div class="flex justify-center max-lg:mx-auto lg:bg-black">

    <div class="flex flex-row py-2 lg:text-white">
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

</div>
    <div class="flex bg-black md:bg-white md:border-b-2 border-gray-200 py-2 text-sm font-medium text-white md:text-black items-center justify-between items-center max-h-[50px]">
        <div class="oswald flex flex-row items-center text-md max-md:hidden py-2 uppercase gap-2">
       <div><a href="/" class="{{ request()->routeIs('front.index') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">HABERLER</a></div>
       <div> <a href="{{ route('front.bloglar') }}" class="{{ request()->routeIs('front.bloglar') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">Bloglar</a></div>
       <div><x-front.kategoricanvas/></div>
       <div> <a href="{{ route('front.duyurular') }}" class="py-2 hover:text-white hover:bg-black px-2">Resmi Kurum Duyuruları</a></div>
    </div>

    <div class="md:hidden px-4 min-h-[50px] flex items-center text-md">
        <button @click=" Open = ! Open" type="submit" x-show="! Open"><i class="fa-solid fa-bars-staggered fa-xl text-white hover:text-orange-500"></i></button>
        <button @click=" Open = ! Open" type="submit" x-show="Open">
            <i class="fa-solid fa-xmark fa-xl text-white hover:text-orange-500 hover:rotate-90 transition ease-out duration-500"></i>
            </button>
    </div>

    <div class="flex px-4 lg:px-6 items-center text-md">
        <div class="px-2 text-sm font-medium text-black oswald uppercase max-md:hidden"> {{ $date = Carbon\Carbon::now()->translatedFormat('d-m-Y l') }}</div>
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
