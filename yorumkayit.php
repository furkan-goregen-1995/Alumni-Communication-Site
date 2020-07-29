<?php 

include 'baglan.php';

if (isset($_POST['yorumilet'])){


$yorumlar = $_POST["yorumlar"];
$uye_id = $_POST["uye_id"];
$form_id = $_POST["form_id"];

$yeni = mysql_query("INSERT INTO yorum(yorumlar,uye_id,form_id) VALUES ('$yorumlar','$uye_id','$form_id')");
 

if($yeni)
{

    $id2=$_GET["id"];

    header('Location:yorum.php?id=$_GET["id"]');
    
}
else
{
   
    header('Location:404.php');
}
}
?>