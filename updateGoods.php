<?php

include_once('db.php');



$id = $_POST['id'];
$title = $_POST['title']; 
$price = $_POST['price'];
$select = $_POST['select'];

$sql = "UPDATE goods SET title='$title', price='$price', id_seller='$select' WHERE id_gd='$id'";


if($mysqli->query($sql)){
    echo "Рядок змінено успішно";
    }
else
    {
        echo "Error" . $sql . "<br/>" . $mysqli->error;
    }




include_once("showGoods.php");
?>
