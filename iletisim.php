
<?php include 'header.php';
      include 'baglan.php';

// oturumu baslatalim

$uye_id=$_SESSION['uye_id'];
$uye_ad=$_SESSION['uye_ad'];
if(!isset($_SESSION['uye_ad'])){

header('Location:giris.php');
 
 }
// giris yapilmis ise $giris true olmali

echo "string";
$uye=mysqli_query($baglan,"SELECT * from uyeler WHERE uye_id='$uye_id'");
$furkan=mysqli_fetch_array($uye);
$uyeid=$furkan['uye_id'];
$uyemail=$furkan['uye_mail'];
$uyead=$furkan['uye_ad'];

?>
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="col-lg-12 col-md-12 col-sm-12">


  <link rel="stylesheet" type="text/css" href="style/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="style/syntax/shCore.css">
  <link rel="stylesheet" type="text/css" href="style/demo.css">
  <style type="text/css" class="init"></style>
<hr/>
  <table id="example" class="display" cellspacing="0" width="100%" style="font-size:11px; text-align:center;">
        <thead>
          <tr>
              <th style="width: 25px;">SIRA NO</th>
                        <th>Üye İsmi</th>           
            <th>Konu</th>
            <th>Forum</th>
                          <th>Sayfaya Git</th>
          </tr>
        </thead>

        <tbody>

               <?php 
$formsorgu=mysqli_query($baglan,"select * from form where form_ad != '' order by form_id desc");
$i = 1;  
  while($formcek=mysqli_fetch_assoc($formsorgu))

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

<a href="grupsohbet.php" type="button" class="btn btn-primary pull-right btn-info">Form Grupları</a>

    <section id="ContactContent">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="contact_area">

            <h1>FORUM</h1>
            
            <p>İş mi arıyorsun? Ya da sirketin var, çalışacak yetenekli elemanlar mı arıyorsun? Ya da takım arkadaşları mı arıyorsun? O zaman durma, sen de forumu doldur, diğer mezunlarla iletişime geç!</p>
            
            <div class="contact_bottom">
              
              <div class="contact_us wow fadeInRightBig">
               
                <h2>BİZE MESAJINI GÖNDER</h2>
                
                 <form action="formkayit.php" method="POST">
                  
                  <input class="form-control" required="" name="form_ad" type="text" placeholder="Adın Soyadın" value="<?php echo "$uyead"; ?>">

                                  
                  <input class="form-control" required="" name="form_konu" type="text" placeholder="Konu">
                  <input type="hidden" name="uye_id" value="<?php echo "$uyeid"; ?>">

                  <textarea class="form-control" cols="30" required="" name="form_mesaj" rows="10" placeholder="Mesajın..."></textarea>
                  
                  <input type="submit" name="ilet" style="width: 100%" class="btn btn-primary" value="GÖNDER">
                
                </form>
              </div>
            </div>
             
             
<a href="formgrup.php" type="button" class="btn btn-primary pull-right btn-info">Form Grubu Oluştur</a>              
             

          </div>
        </div>
      </div>
      
    </section>           


 
<?php include 'footer.php';?>
