@include('cookie-consent::index')
<footer class="bg-white border-t-2 border-gray-200 border-solid roboto mt-16 lg:mx-[170px]">
    <div class="mx-auto max-w-screen-xl pt-8 lg:pt-10">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div>
          <div class="flex justify-center text-black sm:justify-start text-3xl font-medium alfa tracking-[.04em]">
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
            <p class="text-lg font-medium text-orange-500 oswald">Ana Menü</p>

            <ul class="mt-8 space-y-4 text-sm">
              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="/"
                >
                  Haberler
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('front.bloglar') }}"
                >
                  Bloglar
                </a>
              </li>

              <li>
                <a
                  class="text-gray-700 transition hover:text-gray-700/75"
                  href="{{ route('front.habersite') }}"
                >
                  Haber Kaynakları
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
          <p class="text-xs text-white">
            <span class="block sm:inline">TÜM HAKKI SAKLIDIR</span>
          </p>

          <p class="mt-4 text-xs text-white sm:order-first sm:mt-0">
            &copy; 2023 TURKLOG.NET
          </p>
        </div>
      </div>
    </div>
  </footer>
  <button id="to-top-button" onclick="goToTop()" title="Go To Top"
  class="hidden fixed z-50 bottom-80 right-10 p-1 border-0 w-8 h-8 shadow-md bg-black hover:bg-orange-500 text-white text-lg font-semibold transition-colors duration-300 max-md:hidden">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
      <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
  </svg>
  <span class="sr-only">Go to top</span>
</button>


@livewireScripts

<script>
    // Get the 'to top' button element by ID
    var toTopButton = document.getElementById("to-top-button");

    // Check if the button exists
    if (toTopButton) {

        // On scroll event, toggle button visibility based on scroll position
        window.onscroll = function() {
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        };

        // Function to scroll to the top of the page smoothly
        window.goToTop = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    }
  </script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".sample-slider", {
    spaceBetween: 30,
      speed: 500,
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
        slidesPerView: 1,
        spaceBetween: 10,
        allowTouchMove: false,
        loop: true,
        speed: 500,
        autoplay: {
        delay: 4000,
        reverseDirection: true,
        disableOnInteraction: false,
      },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      scrollbar: {
      el: '.swiper-scrollbar',
    },
    });
  </script>
  <script>
var swiper2 = new Swiper('.sample-slider2', {
    direction: 'horizontal',
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        speed: 500,
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
            speed: 500,
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
