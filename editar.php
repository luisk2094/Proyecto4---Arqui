<!DOCTYPE html>
<html lang="en">

<head>
  <title> Insert Book </title>
  <meta charset="utf-8">
  <!-- Cargamos Jquery desde su directorio CDN -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous">
  </script>
  <!-- Cargamos nuesto archivo Java Script-->
  <script type="text/javascript" src="js/functions.js"></script>
  <!---------- Cargamos Bootstrap ------------>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  <div id="wrapper">
    <header id="#header">
      <a href="#" id="menu_on">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </header>

    <nav>
      <img src="imagenes/logo.png" alt="Pocket Books Logo" class="center">
      <p></p>
      <h1> Pocket Books </h1>
      <p></p>
      <ul>
        <li><a href="index.php">All Books</a></li>
        <li><a href="favoritos.php">Favorites</a></li>
        <li><a href="leidos.php">Read Books</a></li>
        <li><a href="noLeidos.php">Unread Books</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="col-sm-6" style="margin-top: 60px;">
        <form class="bd-example" enctype="multipart/form-data" action="php/actualizarLibro.php" method="post">
          <fieldset>
            <?php
            include ('php/conectarBD.php');
            $consulta = mysqli_query($con,
            "SELECT `ID`, `Titulo`, `Autor`, `Idioma`, `Imagen`, `Descripcion`, `Leido`, `Favorito`
            FROM `libro` WHERE `ID` = ".$_GET['ID']);

            $libro = mysqli_fetch_array($consulta);
            ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="512000000" />
            <h1>Informacion de Libro</h1>
            <input type="hidden" name="id" value="<?php echo $_GET['ID']?>"> </input>
            Titulo:<br>
            <input class="form-control" type="text" name="titulo" value="<?php echo $libro['Titulo']?>" required>
            <br><br>
            Autor:<br>
            <input class="form-control" type="text" name="autor" value="<?php echo $libro['Autor']?>" required>
            <br><br>
            Idioma:<br>
            <input class="form-control" type="text" name="idioma" value="<?php echo $libro['Idioma']?>" required>
            <br><br>
            Resumen del Libro:<br>
            <textarea class="form-control" name="resumen"rows="4" cols="50" required> <?php echo $libro['Descripcion']?> </textarea>
            <br><br>
            <input type="file" name="imagen" value="<?php echo $libro['Imagen']?>" required>
            <br><br>
            <?php if ($libro['Leido']){ ?>
            <input type="radio" id="read" name="read" value="read" checked>
            <label class="checks"> Leido </label>
            <input type="radio" id="unread" name="read" value="unread">
            <label class="checks"> No Leido </label>
            <?php } else {?>
            <input type="radio" id="read" name="read" value="read">
            <label class="checks"> Leido </label>
            <input type="radio" id="unread" name="read" value="unread" checked>
            <label class="checks"> No Leido </label>
            <?php }
          if ($libro['Favorito']) {?>
            <input type="checkbox" id="favorites" name="favorites" value="favorites" checked>
            <label class="checks"> Favorito </label>
            <?php } else {?>
            <input type="checkbox" id="favorites" name="favorites" value="favorites">
            <label class="checks"> Favorito  </label>
            <?php } ?>
            <input type="submit" value="Submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
