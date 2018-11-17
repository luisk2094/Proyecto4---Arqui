<?php
echo "declarando variables";
$host = ¨localhost¨;
$username = "root";
$password = ¨¨;
$db = ¨arquitecturainformacion¨;

echo "antes if";
if (isset($_POST['titulo'])
 and !empty($_POST['titulo']) and
 isset($_POST['autor'])
  and !empty($_POST['autor']) and
 isset($_POST['idioma'])
  and !empty($_POST['idioma']) and
 isset($_POST['resumen'])
  and !empty($_POST['resumen']) and
 isset($_POST['imagen'])
  and !empty($_POST['imagen'])) { echo "estoy en el if";

$con=mysqli_connect($host, $username, $password)or die("Problemas al conectar");
mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

echo "INSERT INTO 'Libro' ('Leido', 'Favorito', 'Titulo', 'Autor', 'Idioma', 'Descripcion', 'Imagen')
 VALUES (false, false, '$_POST[titulo]', '$_POST[autor]', '$_POST[idioma]', '$_POST[resumen]', '$_POST[imagen]')";

mysqli_query($con, "INSERT INTO 'Libro' ('Leido', 'Favorito', 'Titulo', 'Autor', 'Idioma', 'Descripcion', 'Imagen')
 VALUES (false, false, '$_POST[titulo]', '$_POST[autor]', '$_POST[idioma]', '$_POST[resumen]', '$_POST[imagen]')");
echo "datos insertados";
}else {
  echo "Problemas al insertar datos";
}
mysqli_close($con);
//header('Location: detalles.html');
 ?>
