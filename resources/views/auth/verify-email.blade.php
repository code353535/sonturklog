<x-front.layout>
    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-medium">ÜYELİK AKTİVASYONU</div>
        <div class="roboto text-sm text-gray-500 mt-1">
            Eposta adresinizi doğrulayın.
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">

    <div class="roboto lg:px-[170px] px-6">
        <div class="md:w-[600px] mx-auto bg-gray-100 py-10 px-10">

    <div class="mb-4 text-md text-gray-600">
        {{ __('Devam edebilmeniz için size e-postayla gönderdiğimiz bağlantıya tıklayarak e-posta adresinizi doğrulamanız gerekmektedir. E-postayı almadıysanız, size başka bir e-posta gönderebiliriz.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Kayıt sırasında verdiğiniz e-posta adresine yeni bir doğrulama bağlantısı gönderildi.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Doğrulama e-postasını tekrar gönder') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="hover:underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Çıkış Yap') }}
            </button>
        </form>
    </div>
</div>
</div>
</x-front.layout>
