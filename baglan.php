<?php 

$username="root";
$password="";
$sunucu="localhost";
$database="proje";

$baglan = new mysqli($sunucu,$username,$password,$database);
//mysqli_query("SET NAMES UTF8");


if(!$baglan)
{
	echo "Baglanti Hatası".mysql_errno();
	exit();
}
 
//$db=mysql_select_db($database,$baglan);
/*if(!$db)
{
	echo "Baglanti Hatasi".mysql_errno(); echo "<br>";
	echo "Veri tabani baglanti bilgilerini /netting/baglan.php dosyasindan düzenleyebilirsiniz";
	exit();
}*/
?>