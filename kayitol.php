<?php 

include 'baglan.php';

if (isset($_POST['kayitol'])){

$uye_ad = $_POST["uye_ad"];
$uye_password = $_POST["uye_password"];
$uye_mail = $_POST["uye_mail"];
 
$add = mysql_query("INSERT INTO uyeler(uye_ad,uye_password,uye_mail) VALUES('$uye_ad','$uye_password','$uye_mail')");
 

if ($add)
{
	
   
    header('Location:profil.php');
    
}
else
{
    
    header('Location:kayit.php');
}
}
?>