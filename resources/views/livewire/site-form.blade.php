<div>

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

    <div class="md:w-[550px] px-4 py-4 border">
        @if($kayitsay >= 3 && auth::user()->role !='admin')
        <section class="kayitsay">

                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium">Limit aşımı!</span> Üzgünüz, her kullanıcı en fazla 3 adet site ekleyebilir.
                            </div>
                          </div>
                          <div class="mt-4 flex justify-center">
                            <a href="{{ URL::previous() }}" type="button" class="w-30 text-white bg-gray-400 hover:bg-gray-500 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-4">
                                Geri dön
                            </a>
                        </div>

        </section>
        @else
        <form wire:submit.prevent="register">
            @if ($currentStep == 1)

                <section class="step-one">


                                <div>
                                    <h2 class="sr-only">Steps</h2>

                                    <div
                                      class=" relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100"
                                    >
                                      <ol
                                        class="relative z-10 flex justify-between text-sm font-medium text-gray-500"
                                      >
                                        <li class="flex items-center gap-2 bg-white p-2">
                                          <span
                                            class="h-6 w-6  bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                          >
                                            1
                                          </span>

                                          <span class="hidden sm:block"> Site Bilgileri </span>
                                        </li>

                                        <li class="flex items-center gap-2 bg-white p-2">
                                          <span
                                            class="h-6 w-6 bg-gray-100 text-center text-[10px]/6 font-bold"
                                          >
                                            2
                                          </span>

                                          <span class="hidden sm:block"> Site Açıklaması </span>
                                        </li>

                                        <li class="flex items-center gap-2 bg-white p-2">
                                          <span
                                            class="h-6 w-6  bg-gray-100 text-center text-[10px]/6 font-bold"
                                          >
                                            3
                                          </span>

                                          <span class="hidden sm:block"> Site Logosu </span>
                                        </li>
                                      </ol>
                                    </div>
                                  </div>
                                    <div>

                                        <x-input-label for="ad" :value="__('Ad')" class="mt-8"/>
                                        <x-text-input id="ad" name="ad" type="text" class="mt-1 block w-full" wire:model="ad" />
                                        <span class="text-sm text-red-600 space-y-1">@error('ad'){{ $message }}@enderror</span>

                                    </div>

                                    <div>
                                        <x-input-label for="url" :value="__('Url Adresi')" class="mt-6"/>
                                        <x-text-input id="url" type="text" class="mt-1 block w-full" wire:model="url" placeholder="https://example.com"/>
                                        <span class="text-sm text-red-600 space-y-1">@error('url'){{ $message }}@enderror</span>


                                    </div>
                                    <div>
                                        <x-input-label for="ad" :value="__('Kategori')" class="mt-6"/>
                                        <select id="anakategori" name="anakategori" wire:model="anakategori" class="mt-1 block w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500">
                                            <option selected>Kategori Seçin</option>
                                            @foreach ($anacategory as $anacategory)
                                 <option value="{{ $anacategory->id }}">{{ $anacategory->ad }}</option>
                                @endforeach
                                </select>
                                <span class="text-sm text-red-600 space-y-1">@error('anakategori'){{ $message }}@enderror</span>
                            </div>



              </section>
              @endif
              @if ($currentStep == 2)
              <section class="step-two">

                            <div
                            class="relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100"
                          >
                            <ol
                              class="relative z-10 flex justify-between text-sm font-medium text-gray-500"
                            >
                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                  class="h-6 w-6 bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                >
                                  1
                                </span>

                                <span class="hidden sm:block"> Site Bilgileri </span>
                              </li>

                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                class="h-6 w-6 bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                >
                                  2
                                </span>

                                <span class="hidden sm:block"> Site Açıklaması </span>
                              </li>

                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                  class="h-6 w-6 bg-gray-100 text-center text-[10px]/6 font-bold"
                                >
                                  3
                                </span>

                                <span class="hidden sm:block"> Site Logosu </span>
                              </li>
                            </ol>
                          </div>

                          <div x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">
                            <x-input-label for="aciklama" :value="__('Açıklama')" class="pt-8"/>
                            <textarea id="aciklama" maxlength="280" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" name="aciklama" rows="4" class="mt-1 block p-2.5 w-full border-gray-300 focus:border-orange-500 focus:ring-orange-500" wire:model="aciklama"></textarea>
                            <span x-bind:class="count < 50 ? 'text-red-500' : 'text-green-500'"  x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
                            <span class="text-sm text-red-600 space-y-1">@error('aciklama'){{ $message }}@enderror</span>
                        </div>

            </section>
            @endif
            @if ($currentStep == 3)
            <section class="step-three">
                            <div
                            class="mb-6 pt-4 relative after:absolute after:inset-x-0 after:top-1/2 after:block after:h-0.5 after:-translate-y-1/2 after:rounded-lg after:bg-gray-100"
                          >
                            <ol
                              class="relative z-10 flex justify-between text-sm font-medium text-gray-500"
                            >
                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                  class="h-6 w-6 bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                >
                                  1
                                </span>

                                <span class="hidden sm:block"> Site Bilgileri </span>
                              </li>

                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                class="h-6 w-6 bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                >
                                  2
                                </span>

                                <span class="hidden sm:block"> Site Açıklaması </span>
                              </li>

                              <li class="flex items-center gap-2 bg-white p-2">
                                <span
                                class="h-6 w-6 bg-orange-500 text-center text-[10px]/6 font-bold text-white"
                                >
                                  3
                                </span>

                                <span class="hidden sm:block"> Site Logosu </span>
                              </li>
                            </ol>
                          </div>

                            <div>
                                @if ($logo)
                                <span class="text-sm px-1"> Logo ön izlemesi:</span>

                                <div class="bg-gray-200 flex justify-center py-4 px-4 "><img class="shadow-md" src="{{ $logo->temporaryUrl() }}"  width="100" height="100"></div>
                            @endif
                                <label class="block mb-2 text-sm font-medium text-gray-900 mt-8" for="large_size">Site Logosu</label>
                            <input class="file:bg-sky-950 file:text-amber-500 file:text-md file:border-0 block w-full text-md text-black border rounded-md border-gray-300 cursor-pointer py-1 focus:outline-none focus:ring-orange-500 focus:border-orange-500" id="logo" type="file" name="logo" wire:model="logo">
                            <div class="text-amber-500 font-bold" wire:loading wire:target="logo">Yükleniyor...</div>
                            <span class="text-sm text-red-600 space-y-1">@error('logo'){{ $message }}@enderror</span>
                        </div>
            </section>
            @endif
            <div class="oswald flex justify-end mt-6 gap-4">
                @if ($currentStep == 1)
            <div></div>
                @endif
                @if ($currentStep == 2 || $currentStep == 3)
                <button type="button" class="oswald px-4 text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500" wire:click="decreaseStep()">Geri</button>
                @endif
                @if ($currentStep == 1 || $currentStep == 2)
                <button type="button" class="oswald px-4 text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500" wire:click="increaseStep()">
                    <svg aria-hidden="true" wire:loading wire:target="increaseStep()" role="status" class="inline w-4 h-4 mr-3 text-orange-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                    İleri</button>
                @endif
                @if ($currentStep == 3)
                <button type="submit" class="oswald px-4 text-black focus:ring-0 focus:outline-none font-medium text-md px-4 py-2 text-center bg-gray-100 hover:bg-black hover:text-orange-500">
                    <svg aria-hidden="true" wire:loading wire:target="register()" role="status" class="inline w-4 h-4 mr-3 text-orange-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                        </svg>
                    Kaydet</button>

                @endif
            </div>
            </form>
            @endif
    </div>
    @if ($currentStep == 1)
    <div class="flex flex-col  md:ml-6 xl:w-[270px]">
        <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-plus mr-2"></i>Site Ekle</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Ad alanı sitenizi tanımlamalıdır. Siteadresi.com şeklinde yazılması önerilir.</div>
        <div class="px-4 py-4 bg-white border text-black max-md:hidden">Url adresi, sitenizin tam erişim adresi olmalıdır. https://siteadi.com</div>
        </div>
        @endif
        @if ($currentStep == 2)
        <div class="flex flex-col  md:ml-6 xl:w-[270px]">
            <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-plus mr-2"></i>Site Ekle</div>
            <div class="px-4 py-4 bg-white border text-black max-md:hidden">Açıklama, en az 50 en fazla 280 karakter uzunluğunda olabilir.</div>

            </div>
        @endif
        @if ($currentStep == 3)
        <div class="flex flex-col  md:ml-6 xl:w-[270px]">
            <div class="px-4 py-4 bg-white border text-black font-bold text-xl oswald"><i class="fa-solid fa-plus mr-2"></i>Site Ekle</div>
            <div class="px-4 py-4 bg-white border text-black max-md:hidden">Logo. en fazla 1mb büyüklüğünde olabilir.</div>
            <div class="px-4 py-4 bg-white border text-black max-md:hidden">Logo, gif, jpeg, wepb, png, jpg formatlarından biri olamalıdır.</div>
            <div class="px-4 py-4 bg-white border text-black max-md:hidden">Arka fonu beyaz (#ffffff) ve 150 x 150px ölçülerinde olamalıdır.</div>
            </div>
        @endif
    </div>
    </div>


</div>



