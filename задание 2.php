<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Числа от 1 до 50</title>
    <style>
        .green { color: green; }
        .red { color: red; }
        .black { color: black; }
    </style>
</head>
<body>
    <h1>Числа от 1 до 50</h1>
    <ul>
        <?php
        for ($число = 1; $число <= 50; $число++) {
            $class = 'black'; 
            if ($число % 3 == 0) {
                $class = 'green'; 
            }
            if ($число % 5 == 0) {
                $class = 'red'; 
            }
            echo "<li class='$class'>$число</li>";
        }
        ?>
    </ul>
</body>
</html>
