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
<hr>
 <div class="col-lg-4 col-md-4 col-sm-4">
<form action="grupekle.php" method="POST">
                  
                                  
                  <input class="form-control" required="" type="text" name="grupform_konu" placeholder="Form Başlığı">
                  <input type="hidden" name="uye_id" value="<?php echo "$uye_id"; ?>">

                  <input type="submit" name="formkaydet"  class="btn btn-primary" value="FORM GRUBUNU BAŞLAT">
                
                </form>
</div>





                <?php include 'footer.php';?>