<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нарушений.нет</title>
    <link rel="stylesheet" href="/styles/home.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="logo">
            <p class="logo__text ">Нарушений.нет</p>
        </div>
        <ul class="menu">
            <a href="/home"><li>рыба</li></a>
            <a href="/array"><li>Массивы</li></a>
            <a href="/"><li>жалобы</li></a>
        </ul>
    </header>
    <main>
        @yield("content")
    </main>
    <footer>
<p>Скутин Леонид Андреевич, 2024</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.4.7/dist/flowbite.min.js"></script>
</body>

</html>
