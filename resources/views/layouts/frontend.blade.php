<!doctype html>
<html lang="{{ env('APP_LOCALE') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<nav class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-5 col-xl-6">
                <a href="{{ route('index') }}" class="text-decoration-none d-flex align-items-center gap-2">
                    <span class="bg-dark rounded-circle d-block" style="width: 35px; height: 35px;"></span>
                    <span class="logo fs-4 text-black">hi.dev</span>
                </a>
            </div>
            <div class="col-7 col-xl-6 col-6  d-flex justify-content-end">
                <ul class="list-unstyled d-flex gap-4 align-items-center">
                    @auth()
                        @include('partials.usermenu')
                    @endauth
                    @guest()
                        @include('partials.guestmenu')
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="py-5" id="body">
    <div class="container py-3">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-5">
                @yield('content')
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
