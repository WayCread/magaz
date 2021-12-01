<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="Лабораторна робота, MySQL, з'єднання з базою даних">
    <meta name="description" content="Лабораторна робота. З'єднання з базою даних">
    <title>Вставка даних</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include_once("showGoods.php")    
    ?>

    <form action="insertIntoGoods.php" method="post">
        <label>Назва товару</label><input name="title" type="text"><br>
        <label>Ціна(грн)</label><input name="price" type="int"><br>
		<label>Продавець</label><select name="select"><option value="1">Roshen</option><option value="2">Nestle</option></select>
        <input type="submit" value="Вставити рядок">
    </form>

</body>
</html>
