<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Charisma Yoga" />
    <title>{{ isset($title) ? $title.' | ' : '' }} {{ env('APP_NAME') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-static/" />

    <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <meta name="theme-color" content="#712cf9" />
</head>

<body class="bg-light">
    @include('components.nav')

    <main class="container">
        @if (session()->has('pesan'))
            <div class="alert alert-info" role="alert">
                {{ session('pesan') }}
            </div>
        @endif
        @include('flash::message')
        @yield('content')
    </main>

    <script src="https://getbootstrap.com/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
