<!DOCTYPE html>
<html>
<head>
<title>magExpress</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel="stylesheet" type="text/css" >
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
<style>
  body{
    background-image: url(images/bg8.jpg);
  }
</style>

</head>
<body>

<div class="container">
<div class="row tex0t-center" style="padding-top: 100px;">


</div>
<div class="row">

<div class="col-md-4 col-sm-offset-4 col-sm-6 col-sm-offset-5 col-xs-10 col-xs-offset-1">
          <!-- Horizontal Form -->
          <div style="background-color: white; opacity: 0.8; margin-top: 60px;" class="panel-body">
        
        <form action="profilkayit.php" method="POST"> 
        
          <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><b>ÜYE PROFİL FORMU</b></h3>
            

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                  
                <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kullanıcı Ad</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="uye_ad" placeholder="Kullanıcı Adı">
                  </div>
                </div>
                
                  
                <div class="form-group">
                <hr/>
                  <label for="inputPassword3" class="col-sm-2 control-label">Şifre</label>

                  <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPassword3" required="" name="uye_password" placeholder="Şifre">
                  </div>
                  </hr>
                </div>
               
              </div>
              
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" required="" name="uye_mail" placeholder="Mail">
                  </div>
                </div>

                <div class="col-sm-12">
                <label for="inputEmail3" class="col-sm-15 control-label">Yaşadığı Şehir</label>
                <select class="form-control" name="profil_sehir">
  <?php include 'iller.php'; ?>
</select>
                
               </div>
                  </hr>
                </div>                
                
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-8 control-label">Bildiği Programlama Dilleri</label>
                  <div class="col-sm-12">
                   <input type="checkbox" name="profil_dil[]" value="C#" id="dil">C#<br>
<input type="checkbox"  id="dil" name="profil_dil[]" value="Java">Java<br>
<input type="checkbox"  id="dil" name="profil_dil[]" value="Pyton">Pyton<br>
<input type="checkbox"  id="dil" name="profil_dil[]" value="C">C<br>
<input type="checkbox"  id="dil" name="profil_dil[]" value="V.B">V.B<br>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-8 control-label">Okuduğu Üniversite/Üniversiteler</label>
                  <div class="col-sm-12">
                    <select class="form-control" name="profil_uni">
                     <option value="">Üniversite Seçiniz</option>
<?php include 'üniversiteler.php'; ?>
</select>
              
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-15 control-label">Çalıştığı Şirket/Şirketler</label>
                  <div class="col-sm-15">
                    <input type="text" class="form-control" required="" name="profil_sirket" placeholder="Şirket İsmi">
                  </div>
                </div>
              
              </div>
              </hr>
              <!-- /.box-body -->
              <div class="box-footer">
               <hr/>

               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-6">
                    <div class="checkbox">
                     
                    </div>
                  </div>
                </div>
              <button name="profilkayit" style="width: 100%" type="submit" class="btn btn-primary">Kaydet</button>
              </hr>
              </form>
              </hr>
              </div>
              <!-- /.box-footer -->
            </form>
            <br>
            <div class="col-sm-offset-2 col-sm-12">
          
             </div>
             </div>
             </div>
             </div>
            
