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

$id=$_GET['id'];
$uye=mysqli_query($baglan,"SELECT * from uyeler WHERE uye_id='$id'");
$furkan=mysqli_fetch_array($uye);
$uyeuni=$furkan['uye_uni'];
$uyesehir=$furkan['uye_sehir'];
$uyedil=$furkan['uye_dil'];
$uyesirket=$furkan['uye_sirket'];
$uyeid=$furkan['uye_id'];
$uyemail=$furkan['uye_mail'];
$uyead=$furkan['uye_ad'];


 ?>       


<?php $resimcek=mysqli_fetch_array(mysqli_query($baglan,"SELECT * from resim WHERE uye_id='$id' order by resim_id desc"));

$resim= $resimcek['resim_ad'];

 ?>

<?php

$durum1 = mysqli_query($baglan,"SELECT * FROM dil where uye_id='$id'");
$durumcek1=mysqli_fetch_array($durum1);
$durum2 = mysqli_query($baglan,"SELECT * FROM isim where uye_id='$id'");
$durumcek2=mysqli_fetch_array($durum2);
$durum3 = mysqli_query($baglan,"SELECT * FROM mail where uye_id='$id'");
$durumcek3=mysqli_fetch_array($durum3);
$durum4 = mysqli_query($baglan,"SELECT * FROM sehir where uye_id='$id'");
$durumcek4=mysqli_fetch_array($durum4);
$durum5 = mysqli_query($baglan,"SELECT * FROM sirket where uye_id='$id'");
$durumcek5=mysqli_fetch_array($durum5);
$durum6 = mysqli_query($baglan,"SELECT * FROM üniversite where uye_id='$id'");
$durumcek6=mysqli_fetch_array($durum6);

?>

            <div class="col-lg-12 col-md-12 col-sm-12">
<hr>
                <div class="box-header with-border">
              <h3 class="box-title">Profil Bilgileri</h3>
            </div>
          <hr>



 <strong><i class="fa fa-book margin-r-5"></i> Profil</strong>
<hr>
          <img  width="400" height="280"  src="images/<?php echo $resimcek['resim_ad'] ?>">    
    <hr>     
            <!-- /.box-header -->
             <strong><i class="fa fa-book margin-r-5"></i> Ad Soyad</strong>
<hr>
<?php
       if($durumcek2['durum']==1){
     ?>
          <p class="text-muted"><?php echo "$uyead"; ?></p>    
       <?php
       }
       ?>
    <hr>          

 <strong><i class="fa fa-book margin-r-5"></i> Mail</strong>
<hr>
<?php
       if($durumcek3['durum']==1){
     ?>

          <p class="text-muted"><?php echo "$uyemail"; ?></p>    
    <?php
       }
       ?>
    <hr>          


              <strong><i class="fa fa-book margin-r-5"></i> Okuduğu Üniversiteler</strong>
<hr>
<?php
       if($durumcek6['durum']==1){
     ?>

          <p class="text-muted"><?php echo "$uyeuni"; ?></p>    
          <?php
       }
       ?>
    <hr>          

              <strong><i class="fa fa-map-marker margin-r-5"></i> Yaşadığı Şehir</strong>
<hr>

<?php
       if($durumcek4['durum']==1){
     ?>

              <p class="text-muted"><?php echo $uyesehir; ?></p>   
            
                     <?php
       }
       ?>
 
            <hr>
            
              <strong><i class="fa fa-pencil margin-r-5"></i> Bildiği Programlama Dilleri</strong>

<hr>
            
            <?php
       if($durumcek1['durum']==1){
     ?>
              <p class="text-muted"><?php echo $uyedil ?></p>    
              
                            <?php
       }
       ?>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Çalıştığı Şirketler</strong>
<hr>

       <?php
       if($durumcek5['durum']==1){
     ?>
            <p class="text-muted"><?php echo $uyesirket; ?></p>   

                               <?php
       }
       ?>    


            </div>
            <!-- /.box-body -->
          </div>
            
   
<hr>

   <a href="mesaj.php?id=<?php echo $id ; ?>" type="button" class="btn btn-primary pull-right btn-info">Mesaj At</a> 

<div class="col-lg-12 col-md-12 col-sm-12"></div>

<div class="col-lg-12 col-md-12 col-sm-12"></div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
              <li><a href="#forumlarım" data-toggle="tab">Forumlar</a></li>
              
            </ul>
            
            <div class="tab-content">
              

              <!-- /.tab-pane -->
              <div class="tab-pane" id="forumlarım">             <!-- The timeline -->
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
$formsorgu=mysqli_query($baglan,"select * from form where uye_id='$id'");
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
          

              <!-- /.tab-pane -->

           
 


         <!-- /.tab-content -->
          
          <?php include 'footer.php'; ?>