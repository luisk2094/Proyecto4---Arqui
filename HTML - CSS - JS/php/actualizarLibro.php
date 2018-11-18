<?php

if (isset($_POST['titulo'])
 and !empty($_POST['titulo']) and
 isset($_POST['autor'])
  and !empty($_POST['autor']) and
 isset($_POST['idioma'])
  and !empty($_POST['idioma']) and
 isset($_POST['resumen'])
  and !empty($_POST['resumen'])) {

include ('conectarBD.php');

$aux = $_FILES['imagen']['name'];
$ext = substr($aux,-4);
$nombreFichero = basename($_FILES['imagen']['tmp_name']).$ext;
$path = "D:/Programas/Xampp/htdocs/proyecto4/imagenes";
$absoluteP = "$path./$nombreFichero";

if (((strpos($_FILES['imagen']['name'], "gif") || strpos($_FILES['imagen']['name'], "jpeg") ||
 strpos($_FILES['imagen']['name'], "jpg")) || strpos($_FILES['imagen']['name'], "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $absoluteP)) {
                echo "El fichero es válido y se subió con éxito.\n";
            } else {
                echo "¡Posible ataque de subida de ficheros!\n";
            }
        }

if(isset($_POST['favorites'])) {
  if($_POST['read'] == "read") {
    mysqli_query($con,  "UPDATE `libro` SET `Leido`=true,`Favorito`=true,`Titulo`='{$_POST['titulo']}',
      `Autor`='{$_POST['autor']}',`Idioma`='{$_POST['idioma']}',`Descripcion`='{$_POST['resumen']}',`Imagen`='{$nombreFichero}'
      WHERE `ID` = {$_POST['id']}");
  } else {
    mysqli_query($con,  "UPDATE `libro` SET `Leido`=false,`Favorito`=true,`Titulo`='{$_POST['titulo']}',
      `Autor`='{$_POST['autor']}',`Idioma`='{$_POST['idioma']}',`Descripcion`='{$_POST['resumen']}',`Imagen`='{$nombreFichero}'
      WHERE `ID` = {$_POST['id']}");
  }
} else {
  if($_POST['read'] == "read") {
    mysqli_query($con,  "UPDATE `libro` SET `Leido`=true,`Favorito`=false,`Titulo`='{$_POST['titulo']}',
      `Autor`='{$_POST['autor']}',`Idioma`='{$_POST['idioma']}',`Descripcion`='{$_POST['resumen']}',`Imagen`='{$nombreFichero}'
      WHERE `ID` = {$_POST['id']}");
  } else {
    mysqli_query($con,  "UPDATE `libro` SET `Leido`=false,`Favorito`=false,`Titulo`='{$_POST['titulo']}',
      `Autor`='{$_POST['autor']}',`Idioma`='{$_POST['idioma']}',`Descripcion`='{$_POST['resumen']}',`Imagen`='{$nombreFichero}'
      WHERE `ID` = {$_POST['id']}");
  }
}
echo "datos Actualizados";
mysqli_close($con);
}else {
  echo "Problemas al actualizar los datos";
}

header('Location: ../index.php');
?>
