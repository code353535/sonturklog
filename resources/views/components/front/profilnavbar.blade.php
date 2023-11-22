<div class="basis-1/3 md:border-r">
    <div class="flex flex-col">
<div class="flex flex-row items-center pb-2 border-b">
    <div class="px-6 py-6">
    @if(Auth::user()->photo)
    <img src=" {{ asset('photo/'.Auth::user()->photo) }}" class="w-16 h-16 border-4 border-orange-500 shadow-md rounded mr-1" alt="Avatar" />
    @else
    <div class="w-16 h-16 relative flex justify-center items-center rounded bg-gray-400 text-lg text-white">
        <i class="fa fa-user fa-2xl"></i>
    </div>
   @endif
</div>
<div class="flex flex-col">
<div class="font-bold">{{ Auth::user()->name }}</div>
<div>{{ Auth::user()->email }}</div>
</div>
</div>
<div x-data="{ open: false }" class="max-md:bg-gray-100 text-sm font-medium">
    <button x-on:click="open = !open" x-show="!open" class="px-6 md:hidden py-2 hover:text-orange-500 font-bold">MENU</button>
    <button x-on:click="open = !open" x-show="open" class="px-6 md:hidden py-2 hover:text-orange-500 font-bold">KAPAT</button>
<div x-bind:class="! open ? 'max-md:hidden' : ''" class="flex flex-col">
    <div class="py-2 px-6 border-b"><a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'text-orange-500':'' }} hover:text-orange-500"><i class="fa-solid fa-user-gear mr-2"></i>Profil  Güncelle</a></div>
   <div class="py-2 px-6 border-b"><a href="{{ route('profile.sifre') }}" class="{{ request()->routeIs('profile.sifre') ? 'text-orange-500':'' }} hover:text-orange-500"><i class="fa-solid fa-user-shield mr-2"></i>Şifreni Güncelle</a></div>
   <div class="py-2 px-6 border-b"><a href="{{ route('site.index') }}" class="{{ request()->routeIs('site.index') ? 'text-orange-500':'' }} hover:text-orange-500"><i class="fa-solid fa-users-rectangle mr-2"></i>Sitelerim</a></div>
   <div class="py-2 px-6 border-b"><a href="{{ route('site.ekle') }}" class="{{ request()->routeIs('site.ekle') ? 'text-orange-500':'' }} hover:text-orange-500"><i class="fa-solid fa-plus mr-2"></i>Site Ekle</a></div>
   <div x-data="{drop: false}" x-cloak="false" class="py-2 px-6 border-b relative">
  <div class="flex justify-between">
    <div><button @click="drop = ! drop" class="hover:text-orange-500"><i class="fa-solid fa-envelope mr-2"></i>Destek Talebi
    </button></div>
    <div><i class="fa-solid fa-chevron-up ml-2" x-bind:class="! drop ? 'rotate-180' : ''"></i></div>
</div>

<div x-show="drop"
        class="flex flex-col text-left text-md mt-2 w-5/6 mx-auto text-black"
        @click.away=" drop = false"
      >
        <a href="{{ route('site.destek') }}" class="{{ request()->routeIs('site.destek') ? 'text-orange-500':'' }} p-2 hover:text-orange-500 mt-1">
          Bilet Oluştur
        </a>
        <a href="{{ route('site.desteklist') }}" class="{{ request()->routeIs('site.desteklist') ? 'text-orange-500':'' }} p-2 hover:text-orange-500 mt-1">
          Biletlerim
        </a>
      </div>
    </div>
   <div class="py-2 px-6 border-b"><a href="{{ route('logout') }}" class="hover:text-orange-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket mr-1"></i> Çıkış Yap</a>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
   </form>
</div>
</div>
</div>
</div>
</div>

