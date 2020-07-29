<?php

include 'baglan.php';

if (isset($_POST['profilkayit'])){



$uye_sehir = $_POST["profil_sehir"];

$uye_dil = implode($_POST["profil_dil"], ', ');

$uye_uni = $_POST["profil_uni"];

$uye_sirket= $_POST["profil_sirket"];

$uye_ad = $_POST["uye_ad"];

$uye_password = $_POST["uye_password"];

$uye_mail = $_POST["uye_mail"];

$i=1;
 
$ekle = mysqli_query($baglan,"INSERT INTO uyeler(uye_ad,uye_password,uye_mail,uye_sehir,uye_dil,uye_uni,uye_sirket) VALUES('$uye_ad','$uye_password','$uye_mail','$uye_sehir','$uye_dil','$uye_uni','$uye_sirket')");

$uyeler=mysqli_query($baglan,"SELECT * FROM uyeler  order by uye_id desc");
$uyecek=mysqli_fetch_array($uyeler);
$uyeid=$uyecek['uye_id'];

$eski = mysqli_query($baglan,"INSERT INTO isim (durum,uye_id) VALUES ('$i','$uyeid')");
$eski1 = mysqli_query($baglan,"INSERT INTO mail (durum,uye_id) VALUES ('$i','$uyeid')"); 
$eski2 = mysqli_query($baglan,"INSERT INTO dil (durum,uye_id) VALUES ('$i','$uyeid')"); 
$eski3 = mysqli_query($baglan,"INSERT INTO sehir (durum,uye_id) VALUES ('$i','$uyeid')"); 
$eski4 = mysqli_query($baglan,"INSERT INTO sirket (durum,uye_id) VALUES ('$i','$uyeid')"); 
$eski5 = mysqli_query($baglan,"INSERT INTO üniversite (durum,uye_id) VALUES ('$i','$uyeid')"); 
 

if ($ekle)

{

  
	header('Location:giris.php');
    
    echo "işlem başarı ile tamamlanmıştır";
    
}

else

{
   
    header('Location:404.php');
}
}

?>