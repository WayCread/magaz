<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Таблиця Goods</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Таблиця Goods</h1>


    <?php

    include_once('db.php');

    $sql = 'SELECT * FROM goods INNER JOIN sellers ON goods.id_seller = sellers.id_seller ORDER BY goods.id_gd';


    /* Надсилаємо запит серверу */
    if($result = $mysqli->query($sql)) {   // $mysqli - наш об'єкт, через який здійснюємо підключення, query - метод, який дозволяє виконати довільний запит

        printf("Список студентів: <br><br>");   // <br> в html - розрив рядка
        printf("<table><tr><th>Ід</th><th>Товар</th><th>Ціна(грн)</th><th>Продавець</th></tr>");   // <br> в html - розрив рядка
        /* Вибірка результатів запиту  */
        while( $row = $result->fetch_assoc() ){ // fetch_assoc() повертає рядок із запиту у вигляді асоціативного масиву, наприклад $row = ['id'=>'1', 'pib'=>'Олександр', 'grupa'=>'ІПЗ-31']
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id_gd'], $row['title'], $row['price'], $row['seller']); //виводимо результат на сторінку
        };
        printf("</table>");
        /*Звільняємо пам'ять*/
        $result->close();
    };

    /*Закриваємо з'єднання*/
    $mysqli->close();
    ?>

    <br><br><br>

    <ul>
        <li><a href="insertIntoGoodsForm.php">Вставити рядок</a><br></li>
        <li><a href="updateGoodsForm.php">Змінити рядок</a><br></li>
        <li><a href="deleteFromGoodsForm.php">Видалити рядок</a><br></li>
		<li><a href="SortBySellers.php">Сортування за продавцями</a><br></li>
        <li><a href="index.html">На головну</a><br></li>
    </ul>
    
</body>
</html>
