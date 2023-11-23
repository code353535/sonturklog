
<footer class="bg-white border-t-2 border-gray-200 border-solid roboto mt-16 lg:mx-[170px]">
    <div class="mx-auto max-w-screen-xl pt-8 lg:pt-10">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div>
          <div class="flex justify-center text-black sm:justify-start text-3xl font-bold">
            <img src="{{ asset('image/logo.png') }}" class="float-left mr-2 w-4 h-8" alt="logo" /> Turklog.net
          </div>

          <p
            class="mt-6 max-w-md text-center leading-relaxed text-sm text-gray-700 sm:max-w-sm sm:text-left"
          >
          Kullanıcılarının, gündemi ve blogları , mümkün olan en iyi kullanıcı deneyimi ile takip etmelerini ve keşfetmelerini sağlayan içerik platformudur.
          </p>


        </div>

        <div
          class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:col-span-2"
        >
          <div class="text-center sm:text-left">
            <p class="text-lg font-medium text-orange-500 oswald">Kullanıcı İşlemleri</p>

            <ul class="mt-8 space-y-4 text-sm">
              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="/login"
                >
                  Giriş Yap
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="/register"
                >
                  Kayıt Ol
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="/forgot-password"
                >
                  Şifremi Unuttum
                </a>
              </li>


            </ul>
          </div>

          <div class="text-center sm:text-left">
            <p class="text-lg font-medium text-orange-500 oswald">Faydalı Bağlantılar</p>

            <ul class="mt-8 space-y-4 text-sm">
                <li>
                    <a
                      class="text-gray-700 transition hover:text-gray-700/75"
                      href="#"
                    >
                      Hakkımızda
                    </a>
                  </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="#"
                >
                  Reklam
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('sss') }}"
                >
                  Sık Sorulan Sorular
                </a>
              </li>
            </ul>
          </div>

          <div class="text-center sm:text-left">
            <p class="text-lg font-medium text-orange-500 oswald">
                Yasal Bağlantılar</p>

            <ul class="mt-8 space-y-4 text-sm">
              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('sartlar') }}"
                >
                  Kullanım Şartları
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('gizlilik') }}"
                >
                  Gizlilik Politikası
                </a>
              </li>
              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('yayinsartlari') }}"
                >
                  Yayın Şartları
                </a>
              </li>
            </ul>
          </div>


        </div>
      </div>

      <div class="oswald mt-12 py-2 bg-black px-4 items-center">
        <div class="text-center sm:flex sm:justify-between sm:text-left">
          <p class="text-xs text-gray-300">
            <span class="block sm:inline">TÜM HAKKI SAKLIDIR</span>
          </p>

          <p class="mt-4 text-xs text-gray-300 sm:order-first sm:mt-0">
            &copy; 2023 TURKLOG.NET
          </p>
        </div>
      </div>
    </div>
  </footer>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".sample-slider", {
    spaceBetween: 30,
      speed: 1500,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
        },
      });
      $('.swiper-pagination-bullet').hover(function() {
      $( this ).trigger( "click" );
    });
    </script>

<script>
    var swiper1 = new Swiper(".sample-slider1", {
        direction: 'vertical',
        effect: 'fade',
        allowTouchMove: false,
        loop: true,
        speed: 1000,
        autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      scrollbar: {
      el: '.swiper-scrollbar',
    },
    });
    $('#scrollbox').on('touchstart', function(event){});
  </script>
  <script>
var swiper2 = new Swiper('.sample-slider2', {
    direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 2000,
        autoplay: {
        delay: 1500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 20,

    },
},
pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  });
</script>
<script>
    var swiper3 = new Swiper('.sample-slider3', {
        direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            speed: 1500,
            autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
          },
          breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 15,

        },
    },
      navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
      });
    </script>
<script>
    $(function() {

        $('.mark-all').click(function() {
            var request = sendRequest();
            request.done(() => {
                $('.main-cls').remove();
            })
        });
    });

    function sendRequest(id = null) {
        var _token = "{{ csrf_token() }}";
        return $.ajax("{{ route('markAsNotification') }}", {
            method: 'POST',
            global:false,
            data: {_token, id}
        });
    }
</script>
<script>
    $(document).on("click", '.link', function(e){
        e.preventDefault();
   var dataId = (this.id);
   let href = $(this).attr('href');
        $.ajax({
            url : "{{ route('front.linksay') }}",
            type: 'POST',
            data: {
        "_method": 'POST',
        "id": dataId,
        "_token":   '{{ csrf_token() }}',
      },
      success: function(resp) {
        window.open( href, '_blank');
            },
            error: function(xhr, status, error, resp) {

  alert('Bir hata oluştu. Çok fazla sayıda deneme yapmış olabilirsiniz.');
}

        });
    });
    $(document).on({

    ajaxStart: function(){
        $("body").addClass("loading");
    },
    ajaxStop: function(){
        $("body").removeClass("loading");
    }
});

    </script>
</body>
</html>
