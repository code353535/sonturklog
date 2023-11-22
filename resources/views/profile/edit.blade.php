<x-front.layout>
    @if ($message = Session::get('success'))
    <x-toastb/>
    @endif
    @if ($message = Session::get('error'))
    <x-toasth/>
    @endif
    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-bold">PROFİL AYARLARI</div>
        <div class="text-sm text-gray-500 mt-1">
            Profil bilgilerinizi düzenleyin.
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">
<div class="flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">

    <x-front.profilnavbar/>

<div class="basis-2/3 flex flex-col-reverse xl:flex-row">

<div class="md:w-[550px] px-4 py-4 border">

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data"  x-data="{ buttonDisabled: false }"
    x-on:submit="buttonDisabled = true">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Ad Soyad')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Eposta')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __(' E-posta adresiniz doğrulanmadı.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Doğrulama e-postasını yeniden göndermek için burayı tıklayın.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('E-posta adresinize yeni bir doğrulama bağlantısı gönderildi.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
<div>
<label class="block mb-2 text-sm font-medium text-gray-900" for="large_size">Profil Resmi</label>
<input class="file:bg-sky-950 file:text-amber-500 file:text-md file:border-0 block w-full text-md text-black border border-gray-300 cursor-pointer  py-1 focus:outline-none focus:ring-orange-500 focus:border-orange-500" id="large_size" type="file" name="photo">
<x-input-error :messages="$errors->get('photo')" class="mt-2" />
</div>
<div class="flex justify-end">
    <button type="submit" class="oswald text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500"  x-bind:disabled="buttonDisabled"
    x-text="buttonDisabled ? 'Lütfen bekleyin...' : 'Güncelle'">Güncelle</button>
    @if (session('status') === 'profile-updated')
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 2000)"
        class="text-sm text-gray-600"
    >{{ __('Güncellendi') }}</p>
@endif
</div>
</form>
</div>
<div class="flex flex-col  md:ml-6 xl:w-[270px]">
    <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-user-gear mr-2"></i>Profil  Güncelle</div>
    <div class="px-4 py-4 bg-white border text-black max-md:hidden">Eposta adresinizi değiştirirseniz, yeniden email doğrulaması yapanız gerekir.</div>
    <div class="px-4 py-4 bg-white border text-black max-md:hidden">Profil fotoğrafınız en fazla 1mb boyutunda. Jpeg, jpg, wepb, png ve gif formatlarından biri olmalıdır.</div>
    </div>
</div>
</div>

    </x-front.layout>
