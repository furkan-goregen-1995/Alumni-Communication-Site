
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


if (isset($_POST['mesajilet'])){


$mesaj = $_POST["mesaj"];
$mesaj_konu = $_POST["uye_ad"];
$kullanici_ad = $_POST["uye_ad"];
$uyeid = $_POST["uye_id"];
$arkid = $_POST["ark_id"];



$yeni3 = mysqli_query($baglan,"INSERT INTO mesaj(mesaj,mesaj_konu,kullanici_ad,uye_id,ark_id) VALUES ('$mesaj','$mesaj_konu','$kullanici_ad','$uyeid','$arkid')");
 

if($yeni3)
{

  echo 'mesajınız iletildi!';
    
}
else
{
   
    echo 'mesajınız maalesef iletilemedi';
}
}

?>

<tbody>
  <link rel="stylesheet" type="text/css" href="style/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="style/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="style/demo.css">
	<style type="text/css" class="init">

	</style>
<hr/>
  <table id="example" class="display" cellspacing="0" width="100%" style="font-size:11px; text-align:center;">
				<thead>
					<tr>
					    <th style="width: 25px;">SIRA NO</th>
                        
                        <th>Sohbet Konu</th>
                        						
						<th>Gönder</th>
					</tr>
				</thead>

				<tbody>

               <?php 


$altformsorgu=mysqli_query($baglan,"select * from form where form_konu!='' and form_id not in (select form_id from altforum where katılımcı_id='$uye_id')");

$i=1;

while($kitapcek=mysqli_fetch_array($altformsorgu)){

 ?>				
<tr>
                        <th><?php echo $i; ?></th>
						

						<th><?php echo $kitapcek['form_konu']; ?> </th>
						
						
                        <th><a href="yorum.php?id=<?php echo $kitapcek['form_id']; ?>" title="Mesaj İsmi">Sohbet Katıl</a></th>
</tr>
  <?php 
   $i++; 

 
}

   ?>                      
 

 </tbody>
</table> 
<a href="formgrup.php" type="button" class="btn btn-primary pull-right btn-info">Grup Sohbeti Başlat</a> 





<?php include 'footer.php';?>
