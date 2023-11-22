@auth
<div x-data="{dropdownMenu: false}" class="relative roboto mt-1" x-cloak="false">
    <!-- Dropdown toggle button -->

    <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center p-2 px-2 py-4">
        @if (auth()->user()->unreadNotifications)
        <i class="fa fa-bell text-gray-300 md:text-black fa-lg"></i>
      @else
      <i class="fa fa-bell text-gray-300 md:text-black fa-lg"></i>
     @endif

      <span class="sr-only">Notifications</span>
      <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1"> {{\Auth::user()->unreadNotifications->count() }}</div>

    </button>
    <!-- Dropdown list -->
    <div x-show="dropdownMenu" class="mt-12 max-h-[450px] scrollable z-40 absolute -right-2 top-0 bg-white text-clip overflow-y-auto overflow-x-auto shadow-md shadow-slate-500/60 min-w-[350px] max-w-[350px]"
    x-show="Open"
    x-transition:enter="transition duration-700" x-transition:enter-start="transform opacity-0 translate-y-10" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-700 translate-y-10" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-10"
        @click.away=" dropdownMenu = false"
    >

    <div class="flex px-4 py-2 justify-between sticky bg-white top-0 bg-orange.500">
        <div class="text-orange-500 font-bold text-md oswald"><i class="fa-solid fa-envelope text-orange-500 mr-2"></i>Bildirimler</div>
        <div class="text-xs mt-1 text-black font-medium">{{auth()->user()->unreadNotifications->count() }} yeni bildirim.</div>
      </div>

      <ul class="py-2 text-sm text-gray-400 px-4" aria-labelledby="avatarButton">

        @if(auth()->user()->notifications->count() > 0 )
        <div class="main-cls">
        <li>
            @foreach (auth()->user()->unreadNotifications as $notification)
            <a href="#" class="text-md text-black font-bold"><li class="p-1"> {{$notification->data['data']}} <br> <span class="text-xs"><i class="fa-regular fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }} </span></li></a>
            <hr class="h-px px-6 my-2 border-1 border-dotted border-gray-300">
            @endforeach
            @foreach (auth()->user()->readNotifications()->take(2)->get() as $notification)
            <a href="#" class="text-gray-500 font-medium"><li class="p-1"> {{$notification->data['data']}} <br> <span class="text-xs"><i class="fa-regular fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }} </span></li></a>
            <hr class="h-px px-6 my-2 border-1 border-dotted border-gray-300">
            @endforeach
        </li>
    </div>
    @endif
        @if(auth()->user()->notifications->count() === 0 )
        <li>
        <div class="text-md px-4 font-medium text-gray-800">Henüz bir bildiriminiz yok.</div>
      </li>
       @endif

      </ul>
      <div>
    </div>
    @if(auth()->user()->unreadNotifications->count() > 0 )
      <div class="mb-2">
        @if (auth()->user()->unreadNotifications)
        <li class="flex justify-center">
            <a href="#" class="mark-all mb-2 text-sm font-bold text-black hover:text-orange-500 ">Hepsini Okundu İşaretle</a>

        </li>
        @endif
    </div>
    @endif
    </div>

</div>
@endauth
