<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <link rel="icon" href="/img/VlyricsLogo.png">
    @yield('meta')
    <title>{{$title}} | VLyrics</title>

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
@include('partials.navbar')

<div class="container">
        @yield('container')
</div>



@include('partials.footer')
<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>