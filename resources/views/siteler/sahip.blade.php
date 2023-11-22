<x-front.layout>



    @if ($message = Session::get('success'))
    <x-toastb/>
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
        <div class="md:w-[550px] px-4 py-4 border">
            @if(session()->has('error'))
            <div class="p-4 mb-4 text-sm text-red-700 rounded-lg bg-red-50" role="alert">
                {{ session()->get('error') }}
              </div>
        @endif
        <div class="mt-2 mb-2 mb-6"><span class="font-bold">{{ $sahip->url }}</span> sitesinin sahibi olduğunuzu doğrulamak için aşağıdaki kodu meta etiketlerinize ekleyin ve doğrula butonuna basın.
           </div>

                   <div class="w-full mb-10 flex justify-center md:mt-0 sm:max-w-2xl xl:p-0"><code class="language-html text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-600 text-white p-4">
              {{ __('<meta name="turklog" content="verify_token">') }}
                    </code></div>
                    <div class="font-bold w-full flex justify-center">
                        <a href="{{ URL::previous() }}" type="button" class="oswald text-gray-900 max-lg:text-xs text-md bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                            Geri dön
                        </a>
                        <a href="{{route('sahiplik.dogrula',['id' => $sahip->id])}}"
                            type="button" class="oswald text-green-500 max-lg:text-xs text-md bg-green-100 hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"
                            x-data="{loading:false}"
                            x-on:click="loading=true;"
                            x-html="loading ? ` Doğrulanıyor ...` : 'Doğrula'" class="disabled:opacity-50"
                            x-bind:disabled="loading">
                            Doğrula
                        </a>

        </div>
    </div>
    <div class="flex flex-col  md:ml-6 xl:w-[270px]">
        <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-square-check mr-2"></i>Sahiplik Doğrula</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Nasıl yapacağınız hakkında süpheleriniz var ise <x-front.sahipmodal/></div>
        </div>
    </div>
    </div>
    </div>



    </x-front.layout>
