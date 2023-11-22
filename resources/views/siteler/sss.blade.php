<x-front.layout>

    <div class="flex flex-col justify-center items-center inline-block pt-10">
        <div class="oswald text-4xl font-medium">SIK SORULAN SORULAR</div>
        <div class="roboto text-sm text-gray-500 mt-1">
            En çok merak ettikleriniz.
        </div>
    </div>
    <hr class="lg:mx-[170px] my-6 border border-gray-200">
    <div class="roboto flex md:flex-row flex-col px-6 lg:px-[170px] gap-6">



    <div class="w-full flex flex-col-reverse xl:flex-row">
        <div class="w-full px-4 py-4 border flex justify-center">


            <div class="flex mt-6">
                <div class="mr-8">

              <div class="bg-white max-w-4xl mx-auto" x-data="{selected:0}">
                      <ul class="shadow-box">

                      <li class="relative border-b border-gray-200">

                          <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                              <div class="flex items-center justify-between">
                                  <span class="text-lg font-bold">
                                     Turklog nedir?</span>
                                  <span class="ico-plus"></span>
                              </div>
                                          </button>

                          <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                              <div class="p-6">
                                  <p>Kullanıcılarının, gündemi ve blogları , mümkün olan en iyi kullanıcı deneyimi ile takip etmelerini ve keşfetmelerini sağlayan içerik platformudur.
                                    Teknik olarak RSS beslemelerini okuyarak, kullanıcılarına reklamsız ve sade ve hızlı bir şekilde sunar.
                                  </p>
                              </div>
                          </div>

                      </li>


                      <li class="relative border-b border-gray-200">

                          <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                              <div class="flex items-center justify-between">
                                  <span class="text-lg font-bold">
                                      Kullanırken bir ücret ödemem gerekir mi?</span>
                                  <span class="ico-plus"></span>
                              </div>
                                          </button>

                          <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                              <div class="p-6">
                                  <p>Kullanıcı tarafnda da, geliştirici / yayıncı tarafında da tamamen ücretsizdir.</p>
                              </div>
                          </div>

                      </li>


                      <li class="relative border-b border-gray-200">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold">
                                    Blog sitemi eklemek için şartlarınız neler?</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>Öncelikle sitenizin bir rss akışına sahip olması gerekmektedir. Wordpress bloglar varsayılan olarak rss sayfaları içerir. Site adresinizin veya kategori sayfanızın sonuna
                                    /feed ekleyerek rss sayfanıza ulaşabilirsiniz. Diğer şartlarımız için yayın polikamızı okuyunuz.
                                </p>
                            </div>
                        </div>

                    </li>
                    <li class="relative border-b border-gray-200">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold">
                                    Site logomu neden yükleyemiyorum?</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>Site logonuzun, 150 X 150 pixel boyutlarında arka fonu beyaz ve kabul edilen formarlardan birine (jpg, gif, webp, png, jpeg) sahip olmalıdır.
                                </p>
                            </div>
                        </div>

                    </li>
                    <li class="relative border-b border-gray-200">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 5 ? selected = 5 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold">
                                    Yayınlanması için link neden ekleyemiyorum?</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>Yayın linklerinin, kategori sayfaları olması önerilir. Rss (xml) sayfası (Atom beslemelerini şuan için kabul etmiyoruz) olmalıdır. Ulaşılabilir olmalıdır ve en fazla 5 saniye içinde
                                    sunucunuzdan cevap alıyor olmalıyız.
                                </p>
                            </div>
                        </div>

                    </li>
                    <li class="relative border-b border-gray-200">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 6 ? selected = 6 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold">
                                    Yayın linklerim neden siliniyor?</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container6" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container6.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>Bazı durumlarda yayın linkleriniz sistemin sağlığı için silinebilir. Bunun sebeplerinden bazıları; anlık ulaşılamıyor olması, sayfa içeriğinin sonradan değiştirilmiş olması olabilir.
                                </p>
                            </div>
                        </div>

                    </li>
                    <li class="relative">

                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== 7 ? selected = 7 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold">
                                    Yayın akışında neden konulara ait görseller yok?</span>
                                <span class="ico-plus"></span>
                            </div>
                                        </button>

                        <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container7" x-bind:style="selected == 7 ? 'max-height: ' + $refs.container7.scrollHeight + 'px' : ''">
                            <div class="p-6">
                                <p>Wordpress, çantadan çıktığı gibi rss akışını destekler fakat varsayılan olarak konu görselleri ekli değildir. Bunu bir eklenti yardımı ile veya kod ile kendiniz yapmanız gerekir. Eğer rss akışınız görselleri destekliyorsa
                                    hotlink engeli kullanmadığınızdan emin olun, çünkü hotlink kullanıyorsanız görselleri yakalayamayız.
                                </p>
                            </div>
                        </div>

                    </li>
                          </ul>
                  </div>
                </div>



                </div>

                </div>


    </div>
    </div>
    </div>



    </x-front.layout>
