<div x-data="{dropdownMenu: false}" class="relative" x-cloak="false">
    <button @click="dropdownMenu = ! dropdownMenu" class="hover:text-orange-500 flex items-center ml-1">
        @if(Auth::user()->photo)
        <div class="relative">
      <img src=" {{ asset('photo/'.Auth::user()->photo) }}" class="md:w-8 md:h-8 w-6 h-6 rounded border-2 border-orange-500" alt="Avatar" />
    </div>
      @else
      <div class="md:w-8 md:h-8 w-6 h-6 relative flex items-center rounded bg-gray-400 text-lg text-white">
        <i class="fa fa-user px-1 md:px-2"></i>
      </div>

     @endif
      </button>

      <div x-show="dropdownMenu" class="z-40 absolute -right-2 mt-4 bg-white shadow-md shadow-slate-500/60 w-48"
      x-show="Open"
      x-transition:enter="transition duration-700" x-transition:enter-start="transform opacity-0 translate-y-10" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-700 translate-y-10" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-10"
          @click.away=" dropdownMenu = false"
      >

      <ul class="py-3 px-2 text-sm text-black font-medium oswald" aria-labelledby="avatarButton">
        <li>
          <a href="{{ route('profile.edit') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-user-gear mr-1"></i>Profil Güncelle</a>
        </li>
        <hr class="my-1 border border-gray-100">
        <li>
             <a href="{{ route('profile.sifre') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-user-shield mr-1"></i>Şifreni Güncelle</a>
          </li>
          <hr class="my-1 border border-gray-100">
          <li>
            <a href="{{ route('site.index') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-users-rectangle mr-1"></i>Sitelerim</a>
          </li>
          <hr class="my-1 border border-gray-100">
          <li>
            <a href="{{ route('site.ekle') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-plus mr-1"></i> Site Ekle</a>
          </li>
          <hr class="my-1 border border-gray-100">
          <li>
            <a href="{{ route('site.destek') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-envelope-circle-check mr-1"></i></i>Bilet Oluştur</a>
          </li>
          <hr class="my-1 border border-gray-100">
          <li>
            <a href="{{ route('site.desteklist') }}" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-envelope mr-1"></i>Biletlerim</a>
          </li>
          <hr class="my-1 border border-gray-100">
          <li>
            <a href="{{ route('logout') }}" class="block px-4 py-1 hover:text-orange-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket mr-1"></i> Çıkış Yap</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
         </li>
      </ul>
    </div>
</div>
