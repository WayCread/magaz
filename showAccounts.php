<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Таблиця Accounts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Таблиця Accounts</h1>


    <?php

    include_once('db.php');

    $sql = 'SELECT * FROM accounts ORDER BY id';


    if($result = $mysqli->query($sql)) {  

        printf("Список користувачів: <br><br>");   
        printf("<table><tr><th>ІД Користувача</th><th>Логін користувача</th><th>Пароль користувача</th><th>ПІБ</th><th>Адреса</th><th>Номер телефону</th></tr>");   
        while( $row = $result->fetch_assoc() ){ 
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $row['id'], $row['login'], "******", $row['pib'], $row['adr'], $row['num']); 
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
