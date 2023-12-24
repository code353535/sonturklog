<div x-data="{dropdownMenu: false}" class="relative z-50" x-cloak="false" x-show="! Open">
    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center ml-1">
 @if(Auth::user()->photo)
 <div class="relative">
<img src=" {{ asset('photo/'.Auth::user()->photo) }}" class="w-8 h-8 rounded-full border-2 border-dotted border-white" alt="Avatar" />
</div>
@else
<div class="w-8 h-8 relative flex items-center rounded-full bg-white text-lg text-[#d5132d]">
<i class="fa fa-user px-2"></i>
</div>
@endif
</button>

<div x-show="dropdownMenu" class="z-40 absolute -right-2 mt-2 rounded-lg bg-white shadow-md shadow-slate-500/60 w-48"
x-show="Open"
x-transition:enter="transition duration-700" x-transition:enter-start="transform opacity-0 translate-y-10" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-700 translate-y-10" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-10"
@click.away=" dropdownMenu = false"
>

<ul class="py-3 px-2 text-xs text-black font-medium" aria-labelledby="avatarButton">

<li>
  <a href="{{ route('profile.edit') }}" class="block px-4 py-1 font-bold hover:text-[#d5132d]"><i class="fa-solid fa-user-gear mr-2"></i>Profil Ayarları</a>
</li>
<hr class="my-1 border border-gray-100">
<li>
    <a href="{{ route('profile.sifre') }}" class="block px-4 py-1 font-bold hover:text-[#d5132d]"><i class="fa-solid fa-user-shield mr-2"></i>Şifreni Güncelle</a>
  </li>
  <hr class="my-1 border border-gray-100">
<li>
  <a href="{{ route('logout') }}" class="block px-4 py-1 font-bold hover:text-[#d5132d]" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket mr-2"></i> Çıkış Yap</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</li>
</ul>
</div>
</div>

    </div>
</div>
