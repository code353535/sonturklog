<form wire:submit.prevent="update">
<div class="flex flex-col justify-center items-center inline-block pt-10">
    <div class="oswald text-4xl font-medium">SİTE AYARLARI</div>
    <div class="roboto text-sm text-gray-500 mt-1">
        Site bilgilerinizi düzenleyin.
    </div>
</div>
<hr class="lg:mx-[170px] my-6 border border-gray-200">

<div class="roboto flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">

    <x-front.profilnavbar/>

<div class="basis-2/3 flex flex-col-reverse xl:flex-row">

<div class="md:w-[550px] px-4 py-4 border">
    <div class="mb-6">
        <input type="hidden" id="id" name="id" wire:model="id">
        <x-input-label for="ad" :value="__('Ad')"/>

        <x-text-input id="ad" name="ad" type="text" class="mt-1 block w-full" wire:model="ad" />
        <span class="text-rose-500 mt-2 text-sm">@error('ad'){{ $message }}@enderror</span>

    </div>


    <div class="mb-6">
        <x-input-label for="ad" :value="__('Kategori')" />
        <select id="anakategori" name="anakategori" wire:model="kategori" class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500">

            @foreach ($anacategory as $anacategory)

 <option value="{{ $anacategory->id }}" @selected('$site->anacategory->id' == $anacategory->id)>{{ $anacategory->ad }}
</option>
@endforeach
</select>
<span class="text-rose-500 mt-2">@error('anakategori'){{ $message }}@enderror</span>
</div>
<div class="mb-6" x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
<x-input-label for="aciklama" :value="__('Açıklama')"/>
<textarea id="aciklama" name="aciklama" rows="4" maxlength="280" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" class="mt-1 block p-2.5 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500" wire:model="aciklama"></textarea>
<span x-bind:class="count < 50 ? 'text-red-500' : 'text-green-500'" x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
<span class="text-rose-500 mt-2">@error('aciklama'){{ $message }}@enderror</span>
</div>
<div class="flex justify-end">
<button type="submit" class="oswald px-4 text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500">Güncelle</button>
</div>

</div>
<div class="flex flex-col  md:ml-6 xl:w-[270px]">
    <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-pen-to-square mr-2"></i>Site Düzenle</div>
    <div class="px-4 py-4 bg-white border text-black max-md:hidden">Sitenizin adını, kategorisini ve açıklamasını güncelleyin. Sitenizin logo ve url adresi değiştirilemez. </div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Güncelleme sonrası, değiştirdiğiniz bilgiler yeniden
            incelencek ve onay durumu bekliyor olarak ayarlanacaktır.</div>
    </div>
</div>
</div>
</form>
