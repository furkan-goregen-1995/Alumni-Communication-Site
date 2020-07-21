
<?php include 'header.php';
	  include 'baglan.php';
// oturumu baslatalim



$uye_ad=$_SESSION['uye_ad'];
if(!isset($_SESSION['uye_ad'])){

header('Location:giris.php');
 
 }
// giris yapilmis ise $giris true olmali

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
                        
                        <th>Forum Konu</th>
                        						
						<th>Forumu Aç</th>
					</tr>
				</thead>

				<tbody>

               <?php 
$uye_id=$_SESSION['uye_id'];
$formsorgu2=mysqli_query($baglan, "select * from form where form_konu!='' and form_id in (select form_id from altforum where katılımcı_id='$uye_id')");
$i = 1;  
  while($mesajcek=mysqli_fetch_assoc($formsorgu2))

{

 ?>				
<tr>
                        <th><?php echo $i; ?></th>
						

						<th><?php echo $mesajcek['form_konu']; ?> </th>
						
						
                        <th><a href="yorum.php?id=<?php echo $mesajcek['form_id']; ?>" title="Mesaj İsmi">Formu Aç</a></th>
</tr>
  <?php 
   $i++; 
  }
   
   ?>                      
 

 </tbody>
</table> 
<a href="grup.php" type="button" class="btn btn-primary pull-right btn-info">Grup Sohbeti Başlat</a> 





<?php include 'footer.php';?>
