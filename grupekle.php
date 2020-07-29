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

$form3 = mysqli_query($baglan,"SELECT * FROM form order by form_id desc");

$formlar1 = mysqli_fetch_array($form3);

$kanun1 = $formlar1['form_id'];

$altform=mysqli_query($baglan,"INSERT INTO altforum(form_id,katılımcı_id) VALUES ('$kanun1','$uyeid')");


}

?>

<?php

if (isset($_POST['formkaydet'])){

$uyeid = $_POST["uye_id"];
$forum_konu = $_POST["grupform_konu"];


$formkaydet = mysqli_query($baglan,"INSERT INTO form (form_konu,uye_id) VALUES ('$forum_konu','$uyeid')");

$sohbet2 = mysqli_query($baglan,"SELECT * FROM form order by form_id desc");

$sohbetler = mysqli_fetch_array($sohbet2);

$formid = $sohbetler['form_id'];


$altform=mysqli_query($baglan,"INSERT INTO altforum(form_id,katılımcı_id) VALUES ('$formid','$uyeid')");


}

?>



 

 <div class="col-lg-4 col-md-4 col-sm-4">
<form action="" method="get">
<H3>SOHBETİ OLUŞTURDUN, ŞİMDİ DE KATILIMCI ARKADAŞLARINI SEÇ!</H3>

<select class="form-control" name="uye_id">

<?php 
$kisisorgu3=mysqli_query($baglan,"select * from uyeler");
$i = 1;  
  while($kisicek3=mysqli_fetch_assoc($kisisorgu3))

{

 ?>      


<option value="<?php echo $kisicek3['uye_id']; ?>"><?php echo $kisicek3['uye_ad']; ?></option>

<?php 
   $i++; 
  }
?>


<input type="hidden" name="form_id" value="<?php echo "$formid"; ?>">

                  <input type="submit" name="sec"  class="btn btn-primary" value="EKLE">
                
  

  <a href="yorum.php?id=<?php echo $uyeid ?>">Eklemeyi Bitir</a>
 </form>
</div>

<?php include 'footer.php';?>