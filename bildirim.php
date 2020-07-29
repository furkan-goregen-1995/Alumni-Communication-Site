
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
              <th style="width: 25px;">BİLDİRİM SIRA</th>
                        <th>Bildirim</th>
                                    
            
          </tr>
        </thead>

        <tbody>

               <?php 
$bildirimsorgu=mysqli_query($baglan,"select * from bildirimler where uye_id='$uye_id' and durum='1'");
$b = 1;  
  while($bildirimcek=mysqli_fetch_assoc($bildirimsorgu))

{
 ?>       
<tr>
                        <th><?php echo $b; ?></th>

           
            <th><?php echo $bildirimcek['bildirim']; ?> * </th>
            
            
                       
</tr>
  <?php 
   $b++; 

   $bildirimguncelle=mysqli_query($baglan,"UPDATE bildirimler set durum='0' where uye_id='$uye_id' and durum='1'");
  }
   
   ?>                      
 </tbody>
 </table>





<?php include 'footer.php';?>
