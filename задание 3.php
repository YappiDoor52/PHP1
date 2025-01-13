<?php
//данные о клиентах
$clients = [
    ['name' => 'Иван', 'city' => 'Москва', 'rating' => 5, 'registration_date' => '13.01.2020'],
    ['name' => 'Петр', 'city' => 'Санкт-Петербург', 'rating' => 4, 'registration_date' => '30.03.2001'],
    ['name' => 'Сергей', 'city' => 'Нижний Новгород', 'rating' => 3, 'registration_date' => '02.07.2015']
];

//форма
$filtered_clients = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = htmlspecialchars($_POST['city']);
    $rating = intval($_POST['rating']);

    //фильтрация
    $filtered_clients = array_filter($clients, function($client) use ($city, $rating) {
        return $client['city'] === $city && $client['rating'] >= $rating;
    });
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фильтрация клиентов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 0 auto 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .rating-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .rating-buttons label {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            flex: 1;
            text-align: center;
        }
        .rating-buttons input[type="radio"]:checked + label {
            background-color:rgb(55, 33, 134);
            color: white;
        }
        #results {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .no-results {
            text-align: center;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Фильтрация клиентов</h1>
    <form method="POST" action="">
        <label for="city">Город:</label>
        <input type="text" id="city" name="city" placeholder="Введите город" required>

        <label>Минимальный рейтинг:</label>
        <div class="rating-buttons">
            <input type="radio" id="rating1" name="rating" value="1" required>
            <label for="rating1">1</label>

            <input type="radio" id="rating2" name="rating" value="2">
            <label for="rating2">2</label>

            <input type="radio" id="rating3" name="rating" value="3">
            <label for="rating3">3</label>

            <input type="radio" id="rating4" name="rating" value="4">
            <label for="rating4">4</label>

            <input type="radio" id="rating5" name="rating" value="5">
            <label for="rating5">5</label>
        </div>

        <input type="submit" value="Фильтровать">
    </form>

    <div id="results">
        <h2>Результаты:</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($filtered_clients)) {
                echo "<table>";
                echo "<tr><th>Имя</th><th>Город</th><th>Рейтинг</th><th>Дата регистрации</th></tr>";
                foreach ($filtered_clients as $client) {
                    echo "<tr>";
                    echo "<td>{$client['name']}</td>";
                    echo "<td>{$client['city']}</td>";
                    echo "<td>{$client['rating']}</td>";
                    echo "<td>{$client['registration_date']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-results'>Клиенты не найдены.</p>";
            }
        }
        ?>
    </div>
</body>
</html>