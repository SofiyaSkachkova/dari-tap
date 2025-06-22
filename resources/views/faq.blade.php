<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вопросы и ответы | DÁRI-TAP</title>
    <link rel="stylesheet" href="{{ asset('styleFaq.css') }}">
</head>
<body>
    <header class="header">
        <h1>DÁRI-TAP</h1>
        <div class="stroka-foto">
            <div class="stroka">
                <p>Вопросы и ответы</p>
            </div>
            <button class="bt1">
                <img src="{{ asset('img/sun.webp') }}" id="icon" loading="lazy">
            </button>
        </div>
    </header>

    <section class="section">
        <div class="block">
            <p>Как пользоваться сайтом DÁRI-TAP?<br>
                Просто введите название лекарства в поиске или найдите его в каталоге в любой из категорий.<br><br>
                Информация на сайте - это медицинская рекомендация?<br>
                Нет. Сайт DÁRI-TAP предоставляет справочную информацию о лекарствах.<br><br>
                Откуда берётся информация о лекарствах?<br>
                Все данные взяты из официальных источников: государственных реестров, инструкций от производителей,
                открытых медицинских баз.<br><br>
                Нужно ли регистрироваться, чтобы пользоваться сайтом?<br>
                Нет, все функции сайта доступны без регистрации.<br></p>
        </div>
    </section>

    <footer class="footer">
        <div class="block1">
            <h1>DÁRI-TAP</h1>
            <h4>© 2025г Онлайн-справочник лекарственных средств</h4>
        </div>
        <div class="block2">
            <h2>Информация</h2>
            <h2>Помощь</h2>
        </div>
    </footer>

    <script src="{{ asset('scriptFaq.js') }}"></script>
</body>
</html>
