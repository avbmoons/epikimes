<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $subject }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #333333; background: #f4f4f6; padding: 20px; }
        .wrapper { background: #ffffff; padding: 30px; border-radius: 6px; max-width: 600px; margin: 0 auto; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .footer { font-size: 12px; color: #999999; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <p>Здравствуйте, <strong>{{ $user->name }}</strong>!</p>
        
        <!-- Выводим текст админа с сохранением переносов строк -->
        <div style="line-height: 1.6; margin-top: 15px;">
            {!! nl2br(e($content)) !!}
        </div>
    </div>
    <div class="footer">
        You have received this email because you are registered in the project. {{ config('app.name') }}.
    </div>
</body>
</html>
