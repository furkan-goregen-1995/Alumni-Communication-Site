<?php include 'header.php';?>

<?php 

// oturumu baslatalim

$uye_id=$_SESSION['uye_id'];
$uye_ad=$_SESSION['uye_ad'];
if(!isset($_SESSION['uye_ad'])){

header('Location:giris.php');
 
 }
// giris yapilmis ise $giris true olmali

?>


<?php

 if($_GET){

$uyeid = $_GET["uye_id"];

$sohbet3 = mysqli_query($baglan,"SELECT * FROM mesaj order by mesaj_id desc");

$sohbetler1 = mysqli_fetch_array($sohbet3);

$kanun = $sohbetler1['mesaj_id'];

$mesajad2= $sohbetler1['mesaj_konu'];

$altsohbet=mysqli_query($baglan,"INSERT INTO altmesaj(mesaj_id,katılımcı_id,durum) VALUES ('$kanun','$uyeid','1')");

$bild2="$mesajad2 sohbet grubuna eklendiniz!";

$bildirim2=mysqli_query($baglan,"INSERT INTO bildirimler(uye_id,durum,bildirim) VALUES ('$uyeid','1','$bild2') ");

}

?>

<?php

if (isset($_POST['kaydet'])){

$uyeid = $_POST["uye_id"];
$form_konu = $_POST["sohbet_konu"];

$yeni = mysqli_query($baglan,"INSERT INTO mesaj (mesaj_konu,uye_id) VALUES ('$form_konu','$uyeid')");

$sohbet2 = mysqli_query($baglan,"SELECT * FROM mesaj order by mesaj_id desc");

$sohbetler = mysqli_fetch_array($sohbet2);

$mesajid = $sohbetler['mesaj_id'];


$altsohbet=mysqli_query($baglan,"INSERT INTO altmesaj(mesaj_id,katılımcı_id,durum) VALUES ('$mesajid','$uyeid','1')");


}

?>

<H3>SOHBETİ OLUŞTURDUN, ŞİMDİ DE KATILIMCI ARKADAŞLARINI SEÇ!</H3>

 

 <div class="col-lg-4 col-md-4 col-sm-4">
<form action="" method="get">


<select class="form-control" name="uye_id">

<?php 
$kisisorgu2=mysqli_query($baglan,"select * from uyeler where uye_id!='$uye_id' and uye_id not in (select katılımcı_id from altmesaj where mesaj_id='$kanun')");
$i = 1;  
  while($kisicek2=mysqli_fetch_assoc($kisisorgu2))

{

 ?>      


<option value="<?php echo $kisicek2['uye_id']; ?>"><?php echo $kisicek2['uye_ad']; ?></option>

<?php 
   $i++; 
  }
?>


<input type="hidden" name="mesaj_id" value="<?php echo "$mesajid"; ?>">

                  <input type="submit" name="sec"  class="btn btn-primary" value="EKLE">
                
  

  
 </form>
</div>
<div class="col-lg-12 col-md-12 col-sm-12"></div>
<a href="sohbet.php">Eklemeyi Bitir</a>

<?php include 'footer.php';?>