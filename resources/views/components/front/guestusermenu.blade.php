<div x-data="{dropdownMenu: false}" class="relative" x-cloak="false">
    <button @click="dropdownMenu = ! dropdownMenu" class="hover:text-orange-500 flex items-center">
        <i class="fa-solid fa-user fa-xl"></i>
      </button>

      <div x-show="dropdownMenu" class="z-40 absolute -right-2 mt-6 bg-white shadow-md shadow-slate-500/60 w-40"
      x-show="Open"
      x-transition:enter="transition duration-700" x-transition:enter-start="transform opacity-0 translate-y-10" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-700 translate-y-10" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-10"
          @click.away=" dropdownMenu = false"
      >

      <ul class="py-3 px-2 text-sm text-black font-medium oswald" aria-labelledby="avatarButton">
        <li>
          <a href="/login" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-user-lock mr-1"></i> Üye Girişi</a>
        </li>
        <hr class="my-1 border border-gray-100">
        <li>
             <a href="/register" class="block px-4 py-1 hover:text-orange-500"><i class="fa-solid fa-user-plus mr-1"></i> Üye Kaydı</a>
          </li>
      </ul>
    </div>
</div>
