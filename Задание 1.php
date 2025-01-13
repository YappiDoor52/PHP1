<?php
function сгенерироватьЧисла($нижняя, $верхняя) {
    return range($нижняя, $верхняя);
}

function являетсяПростым($число) {
    if ($число <= 1) return false;
    for ($i = 2; $i <= sqrt($число); $i++) {
        if ($число % $i == 0) {
            return false;
        }
    }
    return true;
}

$result = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $нижняя = (int)$_POST['нижняя'];
    $верхняя = (int)$_POST['вверх'];

    $result = сгенерироватьЧисла($нижняя, $верхняя);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Генерация чисел и проверка на простоту</title>
</head>
<body>
    <h1>Генерация чисел и проверка на простоту</h1>
    <form method="post">
        <label for="нижняя">Нижняя граница:</label>
        <input type="number" id="нижняя" name="нижняя" required>
        <br>
        <label for="вверх">Верхняя граница:</label>
        <input type="number" id="вверх" name="вверх" required>
        <br>
        <input type="submit" value="Сгенерировать">
    </form>

    <?php if (!empty($result)): ?>
        <h2>Сгенерированные числа:</h2>
        <ul>
            <?php foreach ($result as $число): ?>
                <li><?php echo $число; ?> - <?php echo являетсяПростым($число) ? 'Простое' : 'Не простое'; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>

