<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Тестове завдання</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('header')
</head>
<body>

<div class="container">
    <header>
        <div class="row text-center">
            <div class="col-10 text-center">
                <h3>Доброго дня {{auth()->user()->name}}</h3>
            </div>
            <div class="col-2 text-end">
                <form method="POST" action="{{route('logout')}}">
                    @method('delete')
                    @csrf
                    <button class="settings-button  mb-2">
                        <i class="fas fa-sign-out"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>


    <main>
        <div class="credit-card">
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('script')

</body>
</html>
