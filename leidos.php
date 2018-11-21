<!DOCTYPE html>
<html lang="en">

<head>
	<title> Read Books </title>
	<meta charset="utf-8">
	<!-- Cargamos Jquery desde su directorio CDN -->
	<link rel="stylesheet" href="css/estilo.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous">
	</script>
	<!-- Cargamos nuesto archivo Java Script-->
	<script type="text/javascript" src="js/functions.js"></script>
	<!---------- Cargamos Bootstrap ------------>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<header id="#header">
			<a href="#" id="menu_on">
				<span></span>
				<span></span>
				<span></span>
			</a>
			<div class="wrapper"> <button class="button btn-danger" onclick="location.href='agregar.php'"> <i class="fa fa-plus"> </i> Crear Libro</button> </div>
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
			<div class="table-responsive">
				<table class="table table-hover" id="tablasPHP">
					<thead>
						<tr>
							<th>Image</th>
							<th>Title</th>
							<th>Author</th>
							<th>Language</th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
						<?php
							include ('php/conectarBD.php');
							$consulta = mysqli_query($con,  "SELECT `ID`, `Titulo`, `Autor`, `Idioma`, `Imagen` FROM `libro`
							WHERE `Leido` = true");

							while ($libro = mysqli_fetch_array($consulta)){
								echo "<tr>";
								echo "<td><img src='/php/".$libro['Imagen']."' alt='".$libro['ID']."' class='center'></td>
								<td>".$libro['Titulo']."</td>
								<td>".$libro['Autor']."</td>
								<td>".$libro['Idioma']."</td>
								<td> <a title='Detalles' href='detalles.php?ID=".$libro['ID']."'> <i class='fa fa-eye'> </i></a></td>
								</tr>";
							}
							mysqli_close($con);
							?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</body>

</html>
