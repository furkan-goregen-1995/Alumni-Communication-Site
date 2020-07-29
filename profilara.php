<?php include 'header.php';
include 'baglan.php'; ?>

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
            <th>Mail</th>
            <th>Üniversite</th>
            <th>Şehir</th>
            <th>Bildiği Diller</th>
            <th>Şirket</th>
                          <th>Sayfaya Git</th>
          </tr>
        </thead>

        <tbody>

               <?php

$formsorgu2=mysqli_query($baglan,"select * from uyeler");
$i = 1;  
  while($formcek2=mysqli_fetch_assoc($formsorgu2))

{

$id=$formcek2['uye_id'];

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
<tr>
                        <td><?php echo $i; ?></td>
            <th><?php echo $formcek2['uye_ad']; ?> </th>
            <?php
       if($durumcek3['durum']==1){
     ?>

              <th><?php echo $formcek2['uye_mail']; ?> </th>   
            
                     <?php
       }    
       ?>

                     <?php
       if($durumcek3['durum']==0){
     ?>

              <th> </th>   
            
                     <?php
       }
       ?>
 


                  <?php
       if($durumcek6['durum']==1){
     ?>

              <th><?php echo $formcek2['uye_uni']; ?> </th>   
            
                     <?php
       }
       ?>
                 <?php
       if($durumcek6['durum']==0){
     ?>

              <th> </th>   
            
                     <?php
       }
       ?>
 
 


                  <?php
       if($durumcek4['durum']==1){
     ?>

              <th><?php echo $formcek2['uye_sehir']; ?> </th>   
            
                     <?php
       }
       ?>

              <?php
       if($durumcek4['durum']==0){
     ?>

              <th> </th>   
            
                     <?php
       }
       ?>
 

                  <?php
       if($durumcek1['durum']==1){
     ?>

              <th><?php echo $formcek2['uye_dil']; ?> </th>  
            
                     <?php
       }
       ?>


                     <?php
       if($durumcek1['durum']==0){
     ?>

              <th> </th>   
            
                     <?php
       }
       ?>
 
                  <?php
       if($durumcek5['durum']==1){
     ?>

              <th><?php echo $formcek2['uye_sirket']; ?> </th>   
            
                     <?php
       }
       ?>

              <?php
       if($durumcek5['durum']==0){
     ?>

              <th> </th>   
            
                     <?php
       }
       ?>
 

                        <th><a href="ziyaretci.php?id=<?php echo $formcek2['uye_id'];?>">Profil Aç</a></th>
</tr>
  <?php 
   $i++; 
  }
   
   ?>                      
 </tbody>
</table> 

<?php include 'footer.php'; ?>