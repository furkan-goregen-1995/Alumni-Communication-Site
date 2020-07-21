<?php include 'header.php';?>

 <table class="table table-bordered">
<tr>
                  <th style="width: 10px" >#</th>
                  <th style="width: 40px">Kullanıcı</th>
                                    
                  <th style="width: 360px">Mesaj</th>
                 
              
                </tr>
 <?php 

$form_mesaj=$_POST['form_mesaj'];

$formsorgu=mysqli_query($baglan,"select * from form where form_mesaj='$form_mesaj'");
$formcek=mysqli_fetch_assoc($formsorgu);

 ?>

              
                <tr>
                  <td><?php echo $formcek['form_id']; ?></td>
                  <td><?php echo $formcek['form_ad']; ?></td>
                                    
                  <td><?php echo $formcek['form_mesaj']; ?></td>
                  
                 
                </tr>
        

              </table>

   <section id="ContactContent">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="contact_area">

            
            <div class="contact_bottom">
              <div class="contact_us wow fadeInRightBig">
                <h2>YORUMUNU GÖNDER</h2>
                 <form action="islem.php" method="POST"> 
                  <input class="form-control" type="text" required="" name="form_ad" placeholder="Adın Soyadın">
                  <input class="form-control" type="email" required="" name="form_mail" placeholder="Email Adresin">
                  <textarea class="form-control" cols="30" rows="10" required="" name="form_mesaj" placeholder="Yorumun..."></textarea>
                  <input type="submit" style="width: 100%" name="yorum_gonder" class="btn btn-primary" value="Gönder">
                </form>
              </div>
            </div>
             
          </div>
        </div>
      </div>
      
    </section>
  </div>
</div>

<?php include 'footer.php';?>
