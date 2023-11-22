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

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6"  x-data="{ buttonDisabled: false }"
                x-on:submit="buttonDisabled = true">
                    @csrf
                    @method('put')

                    <div>
                        <x-input-label for="current_password" :value="__('Mevcut Şifreniz')" />
                        <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Yeni Şifre')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Yeni Şifre Tekrarı')" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                <button type="submit" class="oswald text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500"  x-bind:disabled="buttonDisabled"
                x-text="buttonDisabled ? 'Lütfen bekleyin...' : 'Güncelle'">Güncelle</button>
                @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        </form>


</div>
<div class="flex flex-col md:ml-6 xl:w-[270px]">
    <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-user-shield mr-2"></i>Şifreni Güncelle</div>
    <div class="px-4 py-4 bg-white border text-black max-md:hidden">Şifreniz en az 8 karakterden oluşmalıdır.</div>

    </div>
</div>
</div>

    </x-front.layout>
