<?php

if (isset($_GET['ID'])
 and !empty($_GET['ID'])) {
   include ('conectarBD.php');

   mysqli_query($con,  "DELETE FROM `libro` WHERE `ID` = {$_GET['ID']}");

   echo "datos Eliminados";
   mysqli_close($con);
}else {
  echo "Problemas al eliminar los datos";
}
header('Location: ../index.php');
?>
