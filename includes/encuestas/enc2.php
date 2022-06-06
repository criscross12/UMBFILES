<form action="enc3.php" method="post">
  <table border="0">
  
<?php
 $respuestas =$_POST['respuestas'];
  for($i=1;$i<=$respuestas;$i++){
?>
  <tr>
    <td>respuesta <?php echo $i; ?></td>
    <td><input name="p<?php echo $i;?>" type="text" size="50" maxlength="50"></td>
  </tr>
<?php } ?>
  </table>
    <input type="submit" name="Submit" value="Enviar"></p>
	<input name="titulo" type="hidden" value="<?php echo $titulo;?>">
	<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
</form>