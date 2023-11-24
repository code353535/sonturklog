<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="title" content="Turklog.net">
        <meta name="description" content="Kullanıcılarının, gündemi ve blogları , mümkün olan en iyi kullanıcı deneyimi ile takip etmelerini ve keşfetmelerini sağlayan içerik platformudur.">
        <meta name="keywords" content="turklog, blog, haber, haberler, sondakika, news, bloglar, en iyi bloglar">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="Turkish">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Turklog.net</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <style>
            .waviy {
              position: relative;
            }
            .waviy span {
              position: relative;
              display: inline-block;
              animation: flip 30s infinite;
              animation-delay: calc(.3s * var(--i))
            }
            @keyframes flip {
              0%,80% {
                transform: rotateY(360deg)
              }
            }
            </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <meta name="yandex-verification" content="950121826458f0f4" />
        <meta name="google-adsense-account" content="ca-pub-7405579499369683">
        <!-- Google tag (gtag.js) -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-NE6QTPCCTY"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
           $(document).ready(function () {
               $('.ckeditor').ckeditor();
           });
       </script>
       <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-NE6QTPCCTY');
      </script>
       <link
       rel="stylesheet"
       href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
     />
    </head>
    <body>
