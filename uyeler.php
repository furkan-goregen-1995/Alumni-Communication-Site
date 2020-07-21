<?php include 'header.php';?>


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
                        	<th>Mesaj Gönder</th>
					</tr>
				</thead>

				<tbody>

               <?php 
$formsorgu=mysql_query("select * from uyeler");
$i = 1;  
  while($formcek=mysql_fetch_assoc($formsorgu))

{

 ?>				
<tr>
                        <td><?php echo $i; ?></td>
						<td><?php echo $formcek['uye_ad']; ?> </td>
						
						<td><?php echo $formcek['uye_mail']; ?></td>
                        <td><a href="iletisim.php?id=<?php echo $formcek['uye_id']; ?>" title="Üye İsmi">Mesaj Gönder</a></td>
</tr>
  <?php 
   $i++; 
  }
   
   ?>                      
 </tbody>
</table> 


   
<?php include 'footer.php';?>
