<x-front.layout>
    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-bold">ŞİFRE SIFIRLAMA FORMU</div>
        <div class="text-sm text-gray-500 mt-1">
            Parolanızı mı unuttunuz? Sorun değil.
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">

    <div class="lg:px-[170px] px-6">
        <div class="md:w-1/3 mx-auto">


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Eposta')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="oswald flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Sıfırla') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-front.layout>
