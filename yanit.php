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

$yeni4=mysqli_query($baglan,"SELECT * FROM mesaj WHERE mesaj_id='$id'");
$furkan4=mysqli_fetch_assoc($yeni4);
$mesajad=$furkan4['mesaj_konu'];
$yonetici=$furkan4['uye_id'];
echo $furkan4['mesaj'];

if (isset($_POST['uyecikar'])){
$cikanid = $_POST["cıkar"];
$solo = mysqli_query($baglan,"UPDATE altmesaj SET durum='0' WHERE katılımcı_id='$cikanid' and mesaj_id='$id'");
$bild="$mesajad sohbet grubundan cıkarıldınız!";
$bildirim=mysqli_query($baglan,"INSERT INTO bildirimler(uye_id,durum,bildirim) VALUES ('$cikanid','1','$bild') ");
}

if(isset($_POST['secekle'])){

  $eklesec = $_POST["eklesec"];
  $z=1;

$altform=mysqli_query($baglan,"INSERT INTO altmesaj(mesaj_id,katılımcı_id,durum) VALUES ('$id','$eklesec','$z')");

$bild2="$mesajad sohbet grubuna eklendiniz!";
$bildirim2=mysqli_query($baglan,"INSERT INTO bildirimler(uye_id,durum,bildirim) VALUES ('$eklesec','1','$bild2') ");


}

if (isset($_POST['yanitilet'])){


$yanit = $_POST["yanit"];
$mesaj_id = $_POST["id"];
$kullanici_ad = $_POST["uye_ad"];
$uyeid = $_POST["uye_id"];

$yeni3 = mysqli_query($baglan,"INSERT INTO yanit(yanit,mesaj_id,kullanici_ad,uye_id) VALUES ('$yanit','$mesaj_id','$kullanici_ad','$uyeid')");
 

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
                        <th>Gönderen</th>
                        <th>Mesaj</th>
                                    
            
          </tr>
        </thead>

        <tbody>

               <?php 
$formsorgu3=mysqli_query($baglan,"select * from yanit where mesaj_id='$id'");
$i = 1;  
  while($yanitcek=mysqli_fetch_assoc($formsorgu3))

{

$sacma3=$yanitcek['uye_id'];
 ?>       
<tr>
                        <th><?php echo $i; ?></th>

  
            <?php 

            $formsorgu5=mysqli_query($baglan,"select * from uyeler where uye_id='$sacma3'");
            $mesajcek3=mysqli_fetch_assoc($formsorgu5);            
          ?>

            <?php if($sacma3==$yonetici){ ?>
           
            <th><?php echo $mesajcek3['uye_ad']; ?> * </th>
           
            <?php } ?>
           
            <?php if($sacma3!=$yonetici){ ?>
           
            <th><?php echo $mesajcek3['uye_ad']; ?> </th>
           
            <?php } ?>


            <th><?php echo $yanitcek['yanit']; ?> </th>
            
            
                       
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

    
           
            
            <div class="contact_bottom">
              
              <div class="contact_us wow fadeInRightBig">
               
              
                
                 <form action="" method="POST">
                  
                               
                   <input type="hidden" name="uye_id" value="<?php echo "$uye_id"; ?>">
                     <input type="hidden" name="uye_ad" value="<?php echo "$uye_ad"; ?>">
                   <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                    
                  <textarea class="form-control" cols="30" required="" name="yanit" type="text" placeholder="Mesajın..."></textarea>
                  
                  <input type="submit" name="yanitilet" style="width: 100%" class="btn btn-primary text-center" value="GÖNDER">
                
                </form>
              </div>
            </div>
             
          
          </div>
        </div>
      </div>
      
    </section>


                 <strong><i class="fa fa-book margin-r-5"></i> Katılımcılar</strong>
               <?php 
$formsorgu8=mysqli_query($baglan,"select * from altmesaj where mesaj_id='$id' and durum='1'");
$a = 1;  
  while($uyecek=mysqli_fetch_assoc($formsorgu8))

{

$sacma4=$uyecek['katılımcı_id'];

$formsorgu9=mysqli_query($baglan,"select * from uyeler where uye_id='$sacma4'");
            $uyecek2=mysqli_fetch_assoc($formsorgu9);            
          
 ?>       
               
<?php if($sacma4==$yonetici){ ?>
<hr>
          <p class="text-muted"><?php echo $uyecek2['uye_ad']; ?> *</p>    
    <hr>
           
            <?php } ?>
<?php if($sacma4!=$yonetici){ ?>
<hr>
          <p class="text-muted"><?php echo $uyecek2['uye_ad']; ?></p>    
    <hr>
           
            <?php } ?>
           
<?php 
   $a++;

  }
?>

<?php if($uye_id==$yonetici){ ?>



<h4> Gruptan Çıkar </h4>

 <form action="" method="POST">
 <div class="form-group"  class="col-sm-4">
 <div class="col-md-4 col-sm-8 col-lg-4" >
<select class="form-control" name="cıkar">
<?php
  $formsorgu9=mysqli_query($baglan,"select * from altmesaj where mesaj_id='$id' and durum='1'");
$b = 1;  
  while($uyecek9=mysqli_fetch_assoc($formsorgu9))

{
$sacma5=$uyecek9['katılımcı_id'];
$formsorgu10=mysqli_query($baglan,"select * from uyeler where uye_id='$sacma5' and uye_id!='$yonetici'");
            $uyecek10=mysqli_fetch_assoc($formsorgu10);      
  ?>
<?php if($sacma5!=$yonetici){ ?>   
                    <option value="<?php echo $uyecek10['uye_id'];?>"><?php echo $uyecek10['uye_ad'];?></option>
                    <?php 
}
  $b++;
  ?>
  
  <?php } ?>

  <input type="submit" name="uyecikar"  class="btn btn-primary text-center" value="ÇIKAR">                  
</select>
</div>
</div>
</form>


 <div class="col-lg-12 col-md-12 col-sm-12"></div>
  <div class="col-lg-12 col-md-12 col-sm-12"></div>
   <div class="col-lg-12 col-md-12 col-sm-12"></div>
    <div class="col-lg-12 col-md-12 col-sm-12"></div>


 

 <div class="col-lg-4 col-md-8 col-sm-4">
<form action="" method="POST">

<H4>Gruba Ekle</H4>

<select class="form-control" name="eklesec">

<?php 
$kisisorgu3=mysqli_query($baglan,"select * from uyeler where uye_id!='$uye_id' and uye_id not in (select katılımcı_id from altmesaj where mesaj_id='$id')");
$i = 1;  
  while($kisicek3=mysqli_fetch_assoc($kisisorgu3))

{

 ?>      


<option value="<?php echo $kisicek3['uye_id']; ?>"><?php echo $kisicek3['uye_ad']; ?></option>

<?php 
   $i++; 
  }
?>




                  <input type="submit" name="secekle"  class="btn btn-primary" value="EKLE">
                


  </select>
 </form>
</div>


<?php } ?>

<?php include 'footer.php';?>
