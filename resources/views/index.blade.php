<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    @yield('title')
    <link href={{asset("fontawesome-free-6.5.1-web/css/fontawesome.css")}} rel="stylesheet">
    <link href={{asset("fontawesome-free-6.5.1-web/css/brands.css")}} rel="stylesheet">
    <link href={{asset("fontawesome-free-6.5.1-web/css/solid.css")}} rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{asset("css/main.css")}}>
    @yield('private_link')

</head>

<body>

@include('header')

@yield('main')

</body>


<script src={{asset("js/main.js")}}></script>
@yield('private_script')
</html>





