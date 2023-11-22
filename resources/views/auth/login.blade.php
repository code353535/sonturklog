<x-front.layout>
<div class="flex flex-col justify-center items-center inline-block pt-10">
    <div class="oswald text-4xl font-bold">ÜYE GİRİŞ FORMU</div>
    <div class="text-sm text-gray-500 mt-1">
        Henüz üye değilmisin?<a href="{{ route('register') }}" class="font-medium hover:underline"> Kayıt ol</a>
    </div>
</div>
<hr class="lg:mx-[170px] my-6 border border-gray-200">

<div class="lg:px-[170px] px-6">
    <div class="md:w-1/3 mx-auto">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}"  x-data="{ buttonDisabled: false }"
    x-on:submit="buttonDisabled = true">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Eposta')" class="my-2"/>
            <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <x-input-label for="password" :value="__('Şifre')" class="my-2"/>
            <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                <input class="border-gray-300 focus:border-orange-500 focus:ring-orange-500 w-full p-2"
                        id="password"
                        :type="show ? 'password' : 'text'"
                        name="password"
                        required autocomplete="new-password" />

                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                    <!-- Heroicon name: eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
                <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                    <!-- Heroicon name: eye-slash -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

    <div class="flex justify-between mt-6">
        <!-- Remember Me -->
        <div class="block">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="w-4 h-4 border border-gray-300 bg-gray-50 focus:ring-0 text-orange-500" name="remember">
                <span class="ml-2 text-sm">{{ __('Beni Hatırla') }}</span>
            </label>
        </div>

        <div class="block">
            @if (Route::has('password.request'))
                <a class="text-sm hover:underline" href="{{ route('password.request') }}">
                    {{ __('Şifremi Unuttum') }}
                </a>
            @endif
        </div>
    </div>
    <div class="oswald flex justify-end">
            <x-primary-button class="mt-6" x-bind:disabled="buttonDisabled"
            x-text="buttonDisabled ? 'Lütfen bekleyin ...' : 'Giriş Yap'">
                {{ __('Giriş Yap') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-front.layout>
