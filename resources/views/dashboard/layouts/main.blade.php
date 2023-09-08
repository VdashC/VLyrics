<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <link rel="icon" href="/img/VlyricsLogo.png">

    <link rel="stylesheet" href="/css/select2.min.css">

    <!-- trix editor -->
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style type="text/css">
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }

    trix-toolbar [data-trix-button-group="block-tools"] {
        display: none;
    }
    </style>

    <title>{{$title}} | VLyrics</title>

    <style>
    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    @include('dashboard.layouts.navbar')

    <div class="container mt-2">
        @yield('container')
    </div>

    @include('dashboard.layouts.footer')
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
    <script src='/js/select2.min.js'></script>
</body>

</html>