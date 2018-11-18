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


mysqli_query($con,  "INSERT INTO `Libro` (`Leido`, `Favorito`, `Titulo`, `Autor`, `Idioma`, `Descripcion`, `Imagen`)
 VALUES (false, false, '$_POST[titulo]', '$_POST[autor]', '$_POST[idioma]', '$_POST[resumen]', '{$nombreFichero}')");
echo "datos insertados";
mysqli_close($con);
}else {
  echo "Problemas al insertar datos";
}
header('Location: ../index.php');
?>
