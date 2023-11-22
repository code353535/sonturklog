<x-front.layout>
    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-bold">ÜYE KAYIT FORMU</div>
        <div class="text-sm text-gray-500 mt-1">
            Zaten üyemisin? <a href="{{ route('login') }}" class="font-medium hover:underline">Giriş yap</a>
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">

<div class="lg:px-[170px] px-6">
    <div class="md:w-1/3 mx-auto">
    <form method="POST" action="{{ route('register') }}"   x-data="{ buttonDisabled: false }"
    x-on:submit="buttonDisabled = true">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Ad Soyad')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Eposta')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Şifre')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Şifre Tekrarı')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-between py-4">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded focus:ring-0 text-amber-500" required="">
                </div>
                <div class="ml-3 text-sm">
                  <label for="remember" class="text-slate-900"><a href="" target="_blank" class="hover:underline">Kullanım Şartları</a>nı okudum ve onaylıyorum.</label>
                </div>
            </div>

        </div>
        <div class="flex items-center justify-end mt-6 oswald">

            <x-primary-button class="ml-4"   x-bind:disabled="buttonDisabled"
            x-text="buttonDisabled ? 'Lütfen bekleyin...' : 'Kaydet'">
                {{ __('Kaydet') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-front.layout>
