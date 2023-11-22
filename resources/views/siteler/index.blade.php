<x-front.layout>

@if ($message = Session::get('success'))
<x-toastb/>
@endif
@if ($message = Session::get('error'))
<x-toasth/>
@endif


<div class="flex flex-col justify-center items-center inline-block pt-10">
    <div class="oswald text-4xl font-bold">SİTE AYARLARI</div>
    <div class="text-sm text-gray-500 mt-1">
        Site bilgilerinizi düzenleyin.
    </div>
</div>
<hr class="lg:mx-[170px] my-6 border border-gray-200">
<div class="flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">

    <x-front.profilnavbar/>

<div class="basis-2/3 flex flex-col-reverse xl:flex-row">
    @if($site->isEmpty())
<div class="md:w-full px-4 py-4 border">
<div class="flex justify-center text-black font-bold">Kayıtlı siteniz bulunmuyor.</div>
@else
<div class="min-w-full py-4 overflow-x-auto">


    <table class="table w-full pt-4 text-black">
        <colgroup>

            <col span="1" style="width: 40%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 20%;">
            <col span="1" style="width: 10%;">
            <col span="1" style="width: 10%;">
         </colgroup>
        <thead>
            <tr class="bg-gray-500 text-white text-sm font-medium">

                <th class="p-3 border border-y-1 border-gray-50 border-l-0">Site</th>
                <th class="p-3 border border-y-1 border-gray-50 border-l-0">Onay</th>
                <th class="p-3 border border-y-1 border-gray-50 border-l-0">Sahiplik</th>
                <th class="p-3 border border-y-1 border-gray-50 border-l-0">Yayın</th>
                <th class="p-3 border border-y-1 border-gray-50 border-l-0">Düzenle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($site as $site)
            <tr class="bg-gray-100 border-b border-white border-4">

                <td class="p-4">
                    <div class="flex items-center text-sm">
                        <img class="rounded-md h-12 w-12 shadow-md shdow-slate-500/50 object-cover" src="{{ asset('storage/logo/'.$site->logo) }}" alt="logo">
                        <div class="ml-3">
                            <div class="font-bold">{{ $site->ad }}</div>
                            <div class="">{{ $site->url }}</div>
                        </div>
                    </div>

                <td class="p-4">
                    <div class="flex items-center justify-center text-sm">
                    @switch($site->durum)
          @case('onaylandi')
          <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-sm font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $site->durum }}</span>
              @break

          @case('reddedildi')
<div  x-data="{drop: false}" x-cloak="false" class="releative">
          <span class="inline-flex items-center rounded-md bg-red-50 px-2 text-sm font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{ $site->durum }}</span>
          <button @click="drop = ! drop" class="hover:text-orange-500"> <i class="fa-solid fa-clipboard-question ml-2 fa-xl text-red-500"></i></button>

        <div x-show="drop"
        class="flex z-40 fixed max-md:flex-col max-md:w-full max-md:left-0 bottom-4 md:right-10  bg-white text-left text-md text-black py-4 px-4 shadow-md shadow-slate-500/50"
        x-transition:enter="transition duration-300" x-transition:enter-start="transform opacity-0 translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition duration-300 translate-y-4" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-4"
        @click.away=" drop = false"
      >
      <span class="inline-flex items-center py-2 text-sm font-medium"><i class="fa-solid fa-triangle-exclamation text-rose-500 mr-2 fa-xl"></i>{{ $site->rednedeni }}</span>
    <span class="inline-flex items-center py-2 text-sm font-medium">Sorunları giderdiğinizi<a href="{{route('site.redonay',['id' => $site->id])}}" class="hover:underline px-1"> onaylayın</a>.</span>
    </div>
</div>

        @break

          @default
          <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-sm font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">{{ $site->durum }}</span>
      @endswitch
                    </div>
                </td>
                <td class="p-4 ">
                <div class="flex items-center justify-center text-sm">
                    @if($site->sahip == 'pasif')
                    <a class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 font-medium text-red-700 ring-1 ring-inset ring-red-600/10" href="{{route('sahiplik.onay',['id' => $site->id])}}">
                        doğrula
                    </a>
                    @else
                    <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 font-medium text-green-700 ring-1 ring-inset ring-green-600/20">doğrulandı</span>
                    @endif
                 </div>
        </td>

        <td class="p-4 ">
            <div class="flex items-center justify-center text-sm">
               @if($site->yayin == 'pasif')
        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-sm font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{ $site->yayin }}</span>
        @else
        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-sm font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $site->yayin }}</span>
        @endif
            </div>
        </td>

                <td class="p-4">
                    <div class="flex items-center justify-center text-sm">
                        @include('components.front.sitemenu')
                    </div>
             </td>

            </tr>

        @endforeach


        </tbody>
    </table>

</div>
@endif
</div>
</div>
</div>



</x-front.layout>
