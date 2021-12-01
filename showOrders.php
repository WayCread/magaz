<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Таблиця Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Таблиця Orders</h1>


    <?php

    include_once('db.php');

    $sql = 'SELECT * FROM orders ORDER BY id_order';


    if($result = $mysqli->query($sql)) {  

        printf("Список замовлень: <br><br>");   
        printf("<table><tr><th>ІД Замовлення</th><th>ІД Кошика</th><th>Дата</th><th>Статус замовлення</th></tr>");   
        while( $row = $result->fetch_assoc() ){ 
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id_order'], $row['id_cart'], $row['date'], $row['status']); 
        };
        printf("</table>");
        
        $result->close();
    };

    
    $mysqli->close();
    ?>

    <br><br><br>

    <ul>
        <li><a href="index.html">На головну</a><br></li>
    </ul>
    
</body>
</html>
