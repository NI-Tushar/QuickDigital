<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quick Digital</title>
    <link rel="icon" href="{{ asset('front/assets/images/fav.jpg') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    
    <!-- index -->

    
    <!-- Flipbook StyleSheet -->
    <link href="{{ url ('front/dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons Stylesheet -->
    <link href="{{ url ('front/dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ url('front/styles/color.css') }}">

    <link rel="stylesheet" href="{{ url('front/styles/style.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/ebook_checkout.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/header.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/slider.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/banner.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/contact_us.css') }}">
    <!-- ebook -->
    <link rel="stylesheet" href="{{ url('front/styles/ebook.css') }}">
    <!-- digital service -->
    <link rel="stylesheet" href="{{ url('front/styles/digital_services.css') }}">
    <!-- digital products -->
    <link rel="stylesheet" href="{{ url('front/styles/digital_products.css') }}">
    <!-- course -->
    <link rel="stylesheet" href="{{ url('front/styles/course.css') }}">
    <!-- terms -->
    <link rel="stylesheet" href="{{ url('front/styles/terms.css') }}">
    <!--track-order -->
    <link rel="stylesheet" href="{{ url('front/styles/track_order.css') }}">
    {{-- subscription --}}
    <link rel="stylesheet" href="{{ url('front/styles/subscription.css') }}">
    <!-- Quick Shop -->
    <link rel="stylesheet" href="{{ url('front/styles/quick_shop.css') }}">
    <!-- Course Details -->
    <link rel="stylesheet" href="{{ url('front/styles/course_details.css') }}">
    <!-- All Courses -->
    <link rel="stylesheet" href="{{ url('front/styles/all_courses.css') }}">

    <link rel="icon" href="{{ url('icon.png') }}" type="image/png">


    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    {{-- video player --}}
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <script src="https://kit.fontawesome.com/ac66cde82a.js" crossorigin="anonymous"></script>

    <!-- slick -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- animate css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- videojs --}}
    <link href="//vjs.zencdn.net/8.3.0/video-js.min.css" rel="stylesheet">
    @stack('css')
</head>

<body>

    @if (Auth::guard('user')->check())
        @include('quick_digital.layout.user_header')
    @else
        @include('quick_digital.layout.header')
    @endif

    @yield('content')

    @include('quick_digital.layout.footer')



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('front/assets/js/custom.js') }}"></script>
    <script src="{{ url('admin/assets/js/custom.js') }}"></script>

    <!-- bootstrap -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- slick -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js"
        integrity="sha512-KgffulL3mxrOsDicgQWA11O6q6oKeWcV00VxgfJw4TcM8XRQT8Df9EsrYxDf7tpVpfl3qcYD96BpyPvA4d1FDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- datatable --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    {{-- video player --}}
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    {{-- video js --}}
    <script src="//vjs.zencdn.net/8.3.0/video.min.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ url('front/dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script>
    <!-- Flipbook main Js file -->
    <script src="{{ url('front/dflip/js/dflip.min.js') }}" type="text/javascript"></script>



    <script>
        $('.home__slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });

        new DataTable('#example');

      // playr.io
      const player = new Plyr('#player');
        const player2 = new Plyr('#player-2');
    </script>

    @stack('script')
</body>

</html>
