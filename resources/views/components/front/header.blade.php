<div x-data="{ Open: false }" class="sticky top-0 z-50 bg-white" x-cloak="false">
    <!-- header -->
<div class="flex flex-col lg:px-[170px] px-6 max-md:px-0 md:pt-4">

    <div class="flex bg-black md:bg-white md:border-b-2 md:pb-4 border-gray-200 max-md:py-8 text-sm font-medium text-white md:text-black items-center justify-between items-center max-h-[50px]">

        <div class="oswald flex flex-row items-center text-md max-md:hidden uppercase gap-2">
            <div class="flex flex-row">
                <div class="flex items-center waviy text-4xl max-md:text-5xl tracking-[.09em] alfa">
                    <span style="--i:1" class="font-medium">T</span>
                    <span style="--i:2" class="font-medium">U</span>
                    <span style="--i:3" class="font-medium">R</span>
                    <span style="--i:4" class="font-medium">K</span>
                    <span style="--i:5" class="font-medium">L</span>
                    <span style="--i:6" class="font-medium">O</span>
                    <span style="--i:7" class="font-medium">G</span>
             </div>
             <span class="font-bold text-xs -rotate-90 px-1 text-orange-500">.NET</span>
            </div>

       <div><a href="/" class="{{ request()->routeIs('front.index') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">HABERLER</a></div>
       <div> <a href="{{ route('front.bloglar') }}" class="{{ request()->routeIs('front.bloglar') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">Bloglar</a></div>
       <div><x-front.kategoricanvas/></div>
       <div> <a href="{{ route('front.habersite') }}" class="{{ request()->routeIs('front.habersite') ? 'text-white bg-black':'' }} py-2 hover:text-white hover:bg-black px-2">Haber Siteleri</a></div>
    </div>
    <div class="flex items-center waviy text-2xl tracking-[.09em] alfa md:hidden px-4">
        <span style="--i:1" class="font-medium">T</span>
        <span style="--i:2" class="font-medium">U</span>
        <span style="--i:3" class="font-medium">R</span>
        <span style="--i:4" class="font-medium">K</span>
        <span style="--i:5" class="font-medium">L</span>
        <span style="--i:6" class="font-medium">O</span>
        <span style="--i:7" class="font-medium">G</span>
 </div>

    <div class="flex px-4 lg:px-6 items-center text-md">
        <div class="px-2 text-sm font-medium text-black oswald uppercase max-md:hidden"> {{ $date = Carbon\Carbon::now()->translatedFormat('d-m-Y l') }}</div>
       <div class="px-2" x-show="! Open"> <x-front.bildirim/></div>
       <div x-show="! Open"> @guest
        <x-front.guestusermenu/>
        @endguest
@auth
<x-front.authusermenu/>
@endauth
</div>
<div class="pl-4 md:hidden">
<button @click=" Open = ! Open" type="submit" x-show="! Open"><i class="fa-solid fa-bars-staggered fa-xl text-white hover:text-orange-500"></i></button>
<button @click=" Open = ! Open" type="submit" x-show="Open">
    <i class="fa-solid fa-xmark fa-xl text-white hover:text-orange-500 hover:rotate-90 transition ease-out duration-500"></i>
    </button>
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
