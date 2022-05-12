<?php include 'conexion.php';
session_start();
if (isset($_SESSION['matricula'])) {
?>

<?php include 'header.php' ?>
<form action="destacarComercio.php" method="POST">
  <p><em>Selecciona el período que deseas destacar tu comercio</em></p>
 
      <input type="radio" name="tiempo" class="form-input" value="7" /> Destacar por 7 días <br>
      <input type="radio" name="tiempo" class="form-input" value="15" /> Destacar por 15 días <br>
      <input type="radio" name="tiempo" class="form-input" value="21" /> Destacar por 21 días <br>
      <input type="radio" name="tiempo" class="form-input" value="30" /> Destacar por 30 días <br>
     <center> <input class="form-btn" name="submit" type="submit" value="Destacar" /></center>
  </form>
<?php
} else {
  header("location: ../index.php");
}
include("futter.php");
?>