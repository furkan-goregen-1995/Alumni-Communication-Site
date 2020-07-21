<?php include 'baglan.php';?>

 <!DOCTYPE html>
<html>
<head>
<title>magExpress</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
 <div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
<?php

session_start();

if(isset($_SESSION['uye_id'])){

$uye_id=$_SESSION['uye_id'];
$sorgula=mysqli_query($baglan,"select * from bildirimler where uye_id='$uye_id' and durum='1'");
$i=0;
while($sorgucek=mysqli_fetch_array($sorgula)){
$i++;
}


  ?>
<li class=""><a href="bildirim.php">Bildirimler(<?php echo $i ?>)</a></li>

<?php
}
 ?>


            </ul>
          </div>
          <div class="header_top_right">
            <form action="#" class="search_form">
              <input type="text" placeholder="Sitede Ara">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="iletisim.php">Site<strong>Mezariles</strong> <span>Mezunlar Arası İletişim Sitesi</span></a></div>
          <div class="header_bottom_right"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
           
<?php 

if(isset($_SESSION['uye_id'])){

  ?>
<li class=""><a href="profilsayfam.php">Profil Sayfam</a></li>
<li class=""><a href="profilara.php">Profil Ara</a></li>
<li class=""><a href="formgruplarim.php?id=<?php echo $uye_id ; ?>">Form Gruplarım</a></li>
<li class=""><a href="mesajlarim.php?id=<?php echo $uye_id?>">Mesajlarım</a></li>
<li class=""><a href="logout.php">CIKIS</a></li>
<?php
}
 ?>

          
                </ul>
        </div>
      </div>
    </nav>
  </div>