
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

$id=$_GET['id'];

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
                        <th>Üye İsmi</th>
                        						
						<th>Gönder</th>
					</tr>
				</thead>

				<tbody>

               <?php 
$formsorgu2=mysqli_query($baglan,"select * from mesaj where ark_id='$uye_id' and uye_id='$id' or ark_id='$id' and uye_id='$uye_id'");
$i = 1;  
  while($mesajcek=mysqli_fetch_assoc($formsorgu2))

{

 ?>				
<tr>
                        <th><?php echo $i; ?></th>
						<th><?php echo $mesajcek['mesaj_konu']; ?> </th>
						
						
                        <th><a href="yanit.php?id=<?php echo $mesajcek['mesaj_id']; ?>" title="Mesaj İsmi">Mesaj Aç</a></th>
</tr>
  <?php 
   $i++; 
  }
   
   ?>                      
 </tbody>
</table> 




<section id="ContactContent">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="contact_area">

            <h1>MESAJ</h1>
           
            
            <div class="contact_bottom">
              
              <div class="contact_us wow fadeInRightBig">
               
                <h2>MESAJ GÖNDER</h2>
                
                 <form action="" method="POST">
                  
                  <input class="form-control" required="" name="uye_ad" type="text" placeholder="Adın Soyadın" value="<?php echo "$uye_ad"; ?>">               
                   <input type="hidden" name="uye_id" value="<?php echo "$uye_id"; ?>">
                    <input type="hidden" name="ark_id" value="<?php echo "$id"; ?>">
                  
                  <textarea class="form-control" cols="30" required="" name="mesaj" rows="10" placeholder="Mesajın..."></textarea>
                  
                  <input type="submit" name="mesajilet" style="width: 100%" class="btn btn-primary" value="GÖNDER">
                
                </form>
              </div>
            </div>
             
            
          
          </div>
        </div>
      </div>
      
    </section>


<?php include 'footer.php';?>
