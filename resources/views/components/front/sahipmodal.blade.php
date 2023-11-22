<div x-data="{ modelOpen: false }" class="flex">
    <button @click="modelOpen =!modelOpen" class="flex text-black text-md bg-white hover:underline focus:ring-0 focus:outline-none inline-flex">

        <span>buraya tıklayın.</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-700 bg-opacity-60" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-bold text-gray-800 ">Doğrulama Kılavuzu</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <p class="mt-2 text-md text-gray-800 ">
                    Bu kılavuzda, sitenizin sahibi olduğunuzu doğrulamanız için size yardımcı olmaya çalışacağız.
                </p>
                <p class="mt-2 mb-4 text-md text-gray-800 "><i class="fa-solid fa-arrow-right mr-2 text-blue-400"></i>Aşağıdaki kodu eksiksiz olarak kopyaladığınıza emin olun.</p>
                <div class="w-full flex justify-center  md:mt-0 sm:max-w-2xl xl:p-0"> <code class="text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-600 text-white rounded-lg p-4 pl-6">
                    {{ __('<meta name="turklog" content="verify_token">') }}
                          </code></div>
                          <p class="mt-4 mb-4 text-md text-gray-800 "><i class="fa-solid fa-arrow-right mr-2 text-blue-400"></i>
                            Bir önbellekleme (cache) kullanıyorsanız. Tüm önbelleği temizleyin.</p>

                            <p class="mt-2 mb-4 text-md text-gray-800 "><i class="fa-solid fa-arrow-right mr-2 text-blue-400"></i>Kopyaladığınız kodu, sitenizin head etiketleri arasına yapıştırın. Head etiketleri, genellikle sitenizin header bölümünde bulunur.</p>
                            <div class="w-full flex justify-center  md:mt-0 sm:max-w-2xl xl:p-0"> <code class="text-sm sm:text-base inline-flex text-left items-center space-x-4 bg-gray-600 text-white rounded-lg p-4 pl-6">
                                {{ __('
                                <head>

                                </head>
                                ') }}
                                      </code></div>
                                      <p class="mt-4 mb-4 text-md text-gray-800 "><i class="fa-solid fa-arrow-right mr-2 text-blue-400"></i>
                                        Son olarak, doğrula butonuna basınız. Doğrulama işlemi biraz zaman alabilir. Doğrulama işlemi bitene kadar, sayfayı kapatmayınız.</p>
                    <div class="flex justify-end mt-6">
                        <button for="show"
                        @click="modelOpen = false" type="button" class="px-3 py-2 text-sm tracking-wide capitalize transition-colors duration-200 transform bg-gray-100 text-black hover:bg-black hover:text-orange-500 shadow-md">
                            Kapat
                        </button>
                    </div>

            </div>
        </div>
    </div>
</div>
