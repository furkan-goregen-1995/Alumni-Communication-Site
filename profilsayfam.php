<?php include 'header.php'; ?>

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
           if (isset($_POST['duzenle'])){

$ad = $_POST["ad"];
if(isset($_POST["ad_durum"])){
$ad_durum = $_POST["ad_durum"];
}
if(!isset($_POST["ad_durum"])){
$ad_durum = 1;
}

$sifre = $_POST["sifre"];

$mail = $_POST["mail"];
if(isset($_POST["mail_durum"])){
$mail_durum = $_POST["mail_durum"];
}
if(!isset($_POST["mail_durum"])){
$mail_durum = 1;
}

$uni = $_POST["uni"];
if(isset($_POST["uni_durum"])){
$uni_durum = $_POST["uni_durum"];
}
if(!isset($_POST["uni_durum"])){
$uni_durum = 1;
}

$sehir = $_POST["sehir"];
if(isset($_POST["sehir_durum"])){
$sehir_durum = $_POST["sehir_durum"];
}
if(!isset($_POST["sehir_durum"])){
$sehir_durum = 1;
}


$dil = $_POST["dil"];
if(isset($_POST["dil_durum"])){
$dil_durum = $_POST["dil_durum"];
}
if(!isset($_POST["dil_durum"])){
$dil_durum = 1;
}


$sirket = $_POST["sirket"];
if(isset($_POST["sirket_durum"])){
$sirket_durum = $_POST["sirket_durum"];
}
if(!isset($_POST["sirket_durum"])){
$sirket_durum = 1;
}

$yeni2 = mysqli_query($baglan,"UPDATE uyeler SET uye_ad='$ad',uye_password='$sifre',uye_mail='$mail',uye_uni='$uni',uye_sehir='$sehir',uye_dil='$dil',uye_sirket='$sirket' WHERE uye_id='$uye_id'");
 
if($dil_durum != NULL){
$yeni3 = mysqli_query($baglan,"UPDATE dil SET durum='$dil_durum' WHERE uye_id='$uye_id'");
}

if($ad_durum != NULL){
$yeni4 = mysqli_query($baglan,"UPDATE isim SET durum='$ad_durum' WHERE uye_id='$uye_id'");
}

if($mail_durum != NULL){
$yeni5 = mysqli_query($baglan,"UPDATE mail SET durum='$mail_durum' WHERE uye_id='$uye_id'");
}

if($sehir_durum != NULL){
$yeni6 = mysqli_query($baglan,"UPDATE sehir SET durum='$sehir_durum' WHERE uye_id='$uye_id'");
}

if($sirket_durum != NULL){
$yeni7 = mysqli_query($baglan,"UPDATE sirket SET durum='$sirket_durum' WHERE uye_id='$uye_id'");
}

if($uni_durum != NULL){
$yeni8 = mysqli_query($baglan,"UPDATE üniversite SET durum='$uni_durum' WHERE uye_id='$uye_id'");
}


if($yeni2)
{
   echo "Bilgilerin başarıyla düzenlendi!";
    
}
else
{
   
     echo "Bilgi düzenleneme başarısız!";
}
}
?>



<?php $resimcek=mysqli_fetch_array(mysqli_query($baglan,"SELECT * from resim WHERE uye_id='$uye_id' order by resim_id desc"));

$resim= $resimcek['resim_ad'];

 ?>

            <div class="col-lg-12 col-md-12 col-sm-12">
<hr>
                <div class="box-header with-border">
              <h3 class="box-title">Profil Bilgilerim</h3>
            </div>
          <hr>

<?php 
$uye=mysqli_query($baglan,"SELECT * from uyeler WHERE uye_id='$uye_id'");
$furkan=mysqli_fetch_array($uye);
$furkanuni=$furkan['uye_uni'];
$furkansehir=$furkan['uye_sehir'];
$uyedil=$furkan['uye_dil'];
$uyesirket=$furkan['uye_sirket'];
$uyeid=$furkan['uye_id'];
$uyemail=$furkan['uye_mail'];
$uyead=$furkan['uye_ad'];


 ?>       
            <!-- /.box-header -->
<strong><i class="fa fa-book margin-r-5"></i> Profil</strong>
<hr>
          <img  width="200" height="140"  src="images/<?php echo $resimcek['resim_ad'] ?>">    
    <hr>     

             <strong><i class="fa fa-book margin-r-5"></i> Ad Soyad</strong>
<hr>
          <p class="text-muted"><?php echo $uyead; ?></p>    
    <hr>          

 <strong><i class="fa fa-book margin-r-5"></i> Mail</strong>
<hr>
          <p class="text-muted"><?php echo $uyemail; ?></p>    
    <hr>          


              <strong><i class="fa fa-book margin-r-5"></i> Okuduğum Üniversiteler</strong>
<hr>
          <p class="text-muted"><?php echo $furkanuni; ?></p>    
    <hr>          

              <strong><i class="fa fa-map-marker margin-r-5"></i> Yaşadığım Şehir</strong>
<hr>
              <p class="text-muted"><?php echo $furkansehir; ?></p>   
            
            <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Bildiğim Programlama Dilleri</strong>
<hr>
            
              <p class="text-muted"><?php echo $uyedil ?></p>    
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Çalıştığım Şirketler</strong>
<hr>
            <p class="text-muted"><?php echo $uyesirket; ?></p>   
    
            </div>
            <!-- /.box-body -->
          </div>

<div class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12"></div>


 <a href="mesajlarim.php?id=<?php echo $uye_id ; ?>" type="button" class="btn btn-primary pull-right btn-info">Mesajlarım</a> 

 <a href="formgruplarim.php?id=<?php echo $uye_id ; ?>" type="button" class="btn btn-danger pull-right btn-info">Forum Gruplarım</a> 


        <div class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12"></div>
<div class="col-lg-12 col-md-12 col-sm-12"></div>

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
              <li><a href="#forumlarım" data-toggle="tab">Forumlarım</a></li>
              <li><a href="#settings" data-toggle="tab">Düzenle</a></li>
               <li><a href="#profil" data-toggle="tab">Profil Resmi Ekle</a></li>
            </ul>
            
            <div class="tab-content">
              

              <!-- /.tab-pane -->
              <div class="tab-pane" id="forumlarım">
                <!-- The timeline -->
<hr>

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
                        <th>Form İsmi</th>           
            <th>Konu</th>
            <th>Forum</th>
                          <th>Sayfaya Git</th>
          </tr>
        </thead>

        <tbody>

               <?php 
$formsorgu=mysqli_query($baglan,"select * from form where uye_id='$uye_id'");
$i = 1;  
  while($formcek=mysqli_fetch_array($formsorgu))

{

 ?>       
<tr>
                        <td><?php echo $i; ?></td>
            <th><?php echo $formcek['form_ad']; ?> </th>
            <th><?php echo $formcek['form_konu']; ?> </th>
            <th><?php echo $formcek['form_mesaj']; ?></th>
                        <th><a href="http://localhost/deneme/yorum.php?id=<?php echo $formcek['form_id'];?>">Forumu Aç</a></th>
</tr>
  <?php 
   $i++; 
  }
   
   ?>                      
 </tbody>
</table> 

     </div>
          

<?php $verisorgu=mysqli_query($baglan,"SELECT * FROM uyeler where uye_id='$uye_id'");
      $vericek=mysqli_fetch_array($verisorgu);
       ?>

              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              
            <div class="col-md-8 col-sm-8 col-lg-8" >
              <div class="box-header with-border">
              <h3 class="box-title">Bilgilerim</h3>
            </div>
            <hr>
            <form action="" method="POST">
                <form class="form-horizontal">


                  <div class="form-group">
                    
                   
                    <label for="inputName" class="col-sm-2 control-label">Ad Soyad</label> 

                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="ad" value="<?php echo $vericek['uye_ad']; ?>" id="inputName">
                    </div>
                    <input type="checkbox" name="ad_durum" value="0" id="ad">Gizle<br> 
                     <div class="col-lg-12 col-md-12 col-sm-12"></div>
                     
                     <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  </div>
                  

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Mail</label>

                    <div class="col-sm-8">
                      <input type="text"  name="mail" value="<?php echo $vericek['uye_mail']; ?>" class="form-control" id="inputEmail">
                    </div>
                    <input type="checkbox" name="mail_durum" value="0" id="mail">Gizle<br>
                    

                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                       
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  </div>

                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Üniversite</label>
<div class="col-sm-8">
                    <select class="form-control" name="uni">
                     <option value="<?php echo $vericek['uye_uni']; ?>"><?php echo $vericek['uye_uni']; ?></option>
<?php include 'üniversiteler.php'; ?> 
</select>
</div>
                    <input type="checkbox" name="uni_durum" value="0" id="uni">Gizle<br>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  </div>
                  

                  <div class="form-group">
                      
                    <label for="inputSkills" class="col-sm-2 control-label">Şehir</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="sehir">
  <option value="<?php echo $vericek['uye_sehir']; ?>"><?php echo $vericek['uye_sehir']; ?></option>
<?php include 'iller.php'; ?> 
</select>
</div>
                    <input type="checkbox" name="sehir_durum" value="0" id="sehir">Gizle<br>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  

                  </div>

                  
                  <div class="form-group">  
                     <label for="inputSkills" class="col-sm-2 control-label">Programlama Dilleri</label>

                    <div class="col-sm-8">
                      <input type="text"  name="dil" value="<?php echo $vericek['uye_dil']; ?>" class="form-control" id="inputEmail">
                    </div>
                    
                     <input type="checkbox" name="dil_durum" value="0" id="dil">Gizle<br>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                    
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  </div>
                  

                  <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Çalışılan Şirketler</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control"  name="sirket" value="<?php echo $vericek['uye_sirket']; ?>" id="inputSkills">
                    </div>
                    <input type="checkbox" name="sirket_durum" value="0" id="sirket">Gizle<br>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  </div>

                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Şifre</label> 

                    <div class="col-sm-8">
                      <input type="Password" class="form-control"  name="sifre" value="<?php echo $vericek['uye_password']; ?>" id="inputName">
                    </div>
                    
                     <div class="col-lg-12 col-md-12 col-sm-12"></div>
                     
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      
                     <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  </div>
                 

                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <div class="checkbox">
                        
                      </div>
                    </div>
                  </div>

                   <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  
                  
     <div class="col-lg-12 col-md-12 col-sm-12"></div>
                      <div class="col-lg-12 col-md-12 col-sm-12"></div>
                       <div class="col-lg-12 col-md-12 col-sm-12"></div>
                  


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                      <button name="duzenle" type="submit" class="btn btn-danger">Bilgilerimi Düzenle</button>
                    </div>
                  </div>

                
            

                  </div>
                </form>
                </form>
              


              </div>


                <div class="tab-pane" id="profil">
              

            <form action="resim.php" method="post" enctype="multipart/form-data"> 
     <hr>               
    <label for="inputSkills" class="col-sm-2 control-label">Profil Ekle</label>

    <input type="file" name="fileUp" />


    <input type="submit" value="Yükle" />

    </form>
    </div>
    </div>
            

              <!-- /.tab-pane -->
         
            <!-- /.tab-content -->
     
          <!-- /.nav-tabs-custom -->
        

        </div>




            <!-- /.tab-content -->
          
          <?php include 'footer.php'; ?>