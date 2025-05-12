<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> About Cats, News, Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        .content {
            padding: 20px;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        .gallery img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <h1> About Cats, News, Contacts</h1>
</header>

<nav>
    <ul>
        <li><a href="#" class="active">About</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">Contacts</a></li>
</nav>

<div class="content">
    <h2>Cats</h2>

    <div class="gallery">
        <?php
        // Задаем путь к папке с изображениями
        $dir = 'image/';
        // Сканируем содержимое директории
        $files = scandir($dir);

        // Если нет ошибок при сканировании
        if ($files !== false) {
            for ($i = 0; $i < count($files); $i++) {
                // Пропускаем текущий каталог и родительский
                if (($files[$i] != ".") && ($files[$i] != "..")) {
                    // Получаем расширение файла
                    $extension = pathinfo($files[$i], PATHINFO_EXTENSION);
                    // Проверяем, что это изображение с расширением jpg
                    if (strtolower($extension) === 'jpg') {
                        // Получаем путь к изображению
                        $path = $dir . $files[$i];
                        // Выводим изображение
                        echo '<img src="' . $path . '" alt="' . $files[$i] . '" />';
                    }
                }
            }
        } else {
            echo '<p>Ошибка при сканировании директории</p>';
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; USM 2025 Cats Gallery</p>
</footer>
</body>
</html>
