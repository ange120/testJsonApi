<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Форма входу</title>

</head>
<body>

<div class="container">
    <h2>Ласкаво просимо!</h2>

    <form method="POST" action="{{route('login')}}">
        @csrf
        <label for="email">Електронна пошта:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Увійти</button>
    </form>

    <a href="{{ route('register.get') }}">Ще не маєте облікового запису? Зареєструйтеся тут.</a>
</div>

</body>
</html>
