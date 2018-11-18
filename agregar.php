<!DOCTYPE html>
<html lang="en">

<head>
	<title> Insert Book </title>
	<meta charset="utf-8">
	<!-- Cargamos Jquery desde su directorio CDN -->
	<script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous">
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

		<section id="content">
			<form action="php/insertarLibro.php" enctype="multipart/form-data" method="post">
				<fieldset>
					<h1>Informacion de Libro</h1>
					<input type="hidden" name="MAX_FILE_SIZE" value="512000000" />
					Titulo:<br>
					<input class="form-control" type="text" name="titulo" value="" required>
					<br><br>
					Autor:<br>
					<input class="form-control" type="text" name="autor" value="" required>
					<br><br>
					Idioma:<br>
					<input class="form-control" type="text" name="idioma" value="" required>
					<br><br>
					Resumen del Libro:<br>
					<textarea class="form-control" name="resumen"rows="4" cols="50" required></textarea>
					<br><br>
					<input type="file" name="imagen" value="" required>
					<br><br>
					<input type="submit" value="Submit">
				</fieldset>
			</form>
		</section>
	</div>
</body>

</html>
