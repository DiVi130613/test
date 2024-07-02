<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
        }

        .container {
            margin-top: 30px;
        }

        .product-item {
            width: 250px;
            margin: 10px;
            padding: 15px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product-title {
            font-weight: bold;
            margin-top: 10px;
        }

        .product-price {
            color: #007bff;
            font-size: 1.2em;
            margin-top: 5px;
        }

        .btn-add-to-cart {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 1em;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4">Наш каталог товаров</h1>

        <div class="row">

            <?php 
                // Подключение к базе данных
                $conn = new mysqli("localhost", "root", "", "db");

                // Запрос на получение данных о товарах
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                // Проверка результата запроса
                if ($result->num_rows > 0) {
                    // Вывод информации о товарах
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                            echo '<div class="product-item">';
                                echo '<img class="product-image" src="' . $row["image_url"] . '" alt="' . $row["name"] . '">';
                                echo '<h3 class="product-title">' . $row["name"] . '</h3>';
                                echo '<p class="product-price">' . $row["price"] . ' руб.</p>';
                                echo '<button class="btn btn-add-to-cart">Добавить в корзину</button>';
                            echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-md-12 text-center">';
                        echo "Товары не найдены.";
                    echo '</div>';
                }

                // Закрытие соединения с базой данных
                $conn->close();
            ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>