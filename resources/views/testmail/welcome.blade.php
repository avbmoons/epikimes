<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Добро пожаловать!</title>
    <style>
        body { font-family: sans-serif; line-height: 1.5; color: #333; background: #f9f9f9; padding: 20px; }
        .card { background: #ffffff; padding: 30px; border-radius: 8px; max-width: 500px; margin: 0 auto; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn { display: inline-block; padding: 10px 20px; background: #2563eb; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Рады вас видеть, {{ $user->name }}! 👋</h2>
        <p>Спасибо за регистрацию в проекте <strong>{{ config('app.name') }}</strong>.</p>
        <p>Ваш аккаунт ({{ $user->email }}) успешно активирован. Теперь вам доступны все функции.</p>
        
        <a href="{{ url('/login') }}" class="btn">Войти в личный кабинет</a>
    </div>
</body>
</html>
