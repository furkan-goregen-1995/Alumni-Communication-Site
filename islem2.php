<?php 

include 'baglan.php';

if($_GET){

$id=$_GET['id'];

$mesaj=$_GET['mesaj'];

}



$yeni = mysql_query("INSERT INTO altmesaj (mesaj_id,katılımcı_id) VALUES ('$mesaj','$id')");

$adres = $_SERVER['HTTP_REFERER'];
header("location:$adres");


?>