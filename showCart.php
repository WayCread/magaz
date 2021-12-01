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

    $sql = 'SELECT * FROM cart INNER JOIN accounts ON cart.id_acc = accounts.id INNER JOIN goods ON cart.id_good = goods.id_gd ORDER BY id_cart';


    if($result = $mysqli->query($sql)) {  

        printf("Список товарів в кошику: <br><br>");   
        printf("<table><tr><th>ІД Кошика</th><th>Логін користувача</th><th>Назва товару</th></tr>");   
        while( $row = $result->fetch_assoc() ){ 
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id_cart'], $row['login'], $row['title']); 
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
