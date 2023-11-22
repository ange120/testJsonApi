<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Форма реєстрації</title>
</head>
<body>

<div class="container">
    <h2>Форма реєстрації</h2>
    <form method="POST" action="{{route('register')}}">
        @csrf
        <label for="name">Ім'я:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="password_confirmation">Підтвердження паролю:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br>


        <button type="submit">Зареєструватися</button>
    </form>

    <a href="{{ route('login.get') }}">Авторизація</a>
</div>

</body>
</html>
