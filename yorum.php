<?php include 'header.php';
include 'baglan.php';

// oturumu baslatalim

$uye_id=$_SESSION['uye_id'];
$uye_ad=$_SESSION['uye_ad'];
if(!isset($_SESSION['uye_ad'])){

header('Location:giris.php');
 
 }
// giris yapilmis ise $giris true olmali


$uye=mysqli_query($baglan,"SELECT * from uyeler WHERE uye_id='$uye_id'");

$furkan=mysqli_fetch_array($uye);

$uyeid=$furkan['uye_id'];

$uyemail=$furkan['uye_mail'];

$uyead=$furkan['uye_ad'];

$id=$_GET["id"];

$uye2=mysqli_query($baglan,"SELECT * from form WHERE form_id ='$id'");

$furkan2=mysqli_fetch_array($uye2);

$formid=$furkan2['form_id'];

$icerik=$furkan2['form_mesaj'];

 echo "$icerik";


if (isset($_POST['yorumilet'])){


$yorumlar = $_POST["yorumlar"];
$uye_id = $_POST["uye_id"];
$form_id = $_POST["form_id"];

$yeni = mysqli_query($baglan,"INSERT INTO yorum(yorumlar,uye_id,forum_id) VALUES ('$yorumlar','$uye_id','$form_id')");
 

if($yeni)
{

  echo 'yorumunuz iletildi!';
    
}
else
{
   
    echo 'yorumunuz maalesef iletilemedi';
}
}

?>



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

                        <th>Kulanıcı Ad</th>
                        <th>Yorumlar</th>           
            
          </tr>
        </thead>

        <tbody>


               <?php 
$formsorgu=mysqli_query($baglan,"select * from yorum where forum_id='$id'");
$i = 1;  
  while($formcek=mysqli_fetch_assoc($formsorgu))

{

 ?>       
<tr>
                        <th><?php echo $i; ?></th>
            <th><?php echo $uyead; ?> </th>            
            <th><?php echo $formcek['yorumlar']; ?> </th>
           
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

            <h1>YORUM</h1>
           
            
            <div class="contact_bottom">
              
              <div class="contact_us wow fadeInRightBig">
               
                <h2>FORMA YORUMUNU GÖNDER</h2>
                
                 <form action="" method="POST">
                  
                  <input class="form-control" required="" name="uye_ad" type="text" placeholder="Adın Soyadın" value="<?php echo "$uyead"; ?>">               
                   <input type="hidden" name="uye_id" value="<?php echo "$uyeid"; ?>">

                    <input type="hidden" name="form_id" value="<?php echo "$formid"; ?>">
                  
                  <textarea class="form-control" cols="30" required="" name="yorumlar" rows="5" placeholder="Yorumun..."></textarea>
                  
                  <input type="submit" name="yorumilet" style="width: 100%" class="btn btn-danger" value="GÖNDER">
                
                </form>
              </div>
            </div>
            
          
          </div>
        </div>
      </div>
      
    </section>


<?php include 'footer.php';?>
