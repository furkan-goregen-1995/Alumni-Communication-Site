<?php 

include 'baglan.php';

if (isset($_POST['loggin'])){

	$uye_ad=$_POST['uye_ad'];
	$uye_password=$_POST['uye_password'];

	if($uye_ad && $uye_password){
		$sql = "SELECT * FROM uyeler where uye_ad='$uye_ad' and uye_password='$uye_password'";
		$sorgula=mysqli_query($baglan, $sql);
		$verisay=mysqli_num_rows($sorgula);
		if($verisay>0){
		
        $sorgula2=mysqli_query($baglan, $sql);
        $furkan=mysqli_fetch_array($sorgula2);
        $uye_id = $furkan[uye_id];
		}
		else{

		}
		
		if ($verisay) {
echo "string";
// oturum baslatalim
session_start();

$giris= true;

$_SESSION['giris']=$giris;
$_SESSION['uye_ad']=$uye_ad;
$_SESSION['uye_id']=$uye_id;
// giris kontorl degiskeni tanimlayalim

// ve degiskenleri kaydedelim

// giris tamamlandi, anasayfaya gonderelim
header("location:iletisim.php");
}
else{
	header("Location:giris.php");
}

}
}
?>

 