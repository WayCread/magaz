<?php

include_once('db.php');


$title = $_POST['title']; 
$price = $_POST['price'];
$select = $_POST['select'];

$sql = "INSERT INTO goods (title, price, id_seller) VALUES ('$title', '$price', '$select')";


if($mysqli->query($sql)){
    echo "Рядок вставлено успішно";
    }
else
    {
        echo "Error" . $sql . "<br/>" . $mysqli->error;
    }


include_once("showGoods.php");

?>
