<?php include 'baglan.php'; ?>

<?php 

// oturumu baslatalim
session_start();

$uye_id=$_SESSION['uye_id'];
$uye_ad=$_SESSION['uye_ad'];
if(!isset($_SESSION['uye_ad'])){

header('Location:giris.php');
 
 }
// giris yapilmis ise $giris true olmali

?>

<?php $kaynak = $_FILES["fileUp"]["tmp_name"]; // tempdeki adı


        $ad =  $_FILES["fileUp"]["name"]; // dosya adı


        $tip = $_FILES["fileUp"]["type"]; // dosya tipi


        $boyut = $_FILES["fileUp"]["size"]; // boyutu


        $hedef = "images"; // başta açtıgımız klasör adımız..


        $uzantı = substr(ad, -4,4);

        
        $rastgelesayi1= rand(10000,50000);


        $rastgelesayi2= rand(10000,50000);	


        $resimad= $rastgelesayi1.$rastgelesayi2.$uzantı;


        $kaydet = move_uploaded_file($kaynak,$hedef."/".$ad); // resmimizi klasöre kayıt ettiriyoruz.


$resimsorgu = mysqli_query($baglan,"INSERT INTO resim(uye_id,resim_ad) VALUES ('$uye_id', '$ad')");


        if($kaydet) // eğer kayıt ettiysek uyarı mesajı yazdırdık.


        {


            echo '<div style="background-colordd; border:1px solid #ccc">Kayit basarili</div>'; 


        }else { echo "Kayit yapilmadi"; }

        header("Location: bossayfa.php");
?>