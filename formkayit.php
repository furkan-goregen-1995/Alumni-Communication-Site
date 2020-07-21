<?php 

include 'baglan.php';

if (isset($_POST['ilet'])){

$form_ad = $_POST["form_ad"];
$form_konu = $_POST["form_konu"];
$form_mesaj = $_POST["form_mesaj"];
$uyeid = $_POST["uye_id"];


$yeni = mysqli_query($baglan,"INSERT INTO form (form_ad,form_konu,form_mesaj,uye_id) VALUES ('$form_ad','$form_konu','$form_mesaj','$uyeid')");


if($yeni)
{
    header('Location:iletisim.php');
    
}
else
{
   
    header('Location:404.php');
}
}
?>