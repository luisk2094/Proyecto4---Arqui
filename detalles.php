<!DOCTYPE html>
<html lang="en">

<head>
	<title> Unread Books </title>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div id="wrapper">
		<header id="#header">
			<a href="#" id="menu_on">
				<span></span>
				<span></span>
				<span></span>
			</a>
			<div class="wrapper">
				<button class="button btn-danger" onclick="<?php echo "location.href='editar.php?ID=".$_GET['ID']."'"?>"> <i class="fa fa-edit"> </i> Editar Libro</button>
				<button class="button btn-danger" onclick="<?php echo "location.href='php/eliminarLibro.php?ID=".$_GET['ID']."'"?>"> <i class="fa fa-trash"> </i> Eliminar Libro</button> </div>
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
				<table class="table" style="border: none;">
					<tbody style="border: none;">
						<?php
							include ('php/conectarBD.php');
							$consulta = mysqli_query($con,
							"SELECT `ID`, `Titulo`, `Autor`, `Idioma`, `Imagen`, `Descripcion`, `Leido`, `Favorito`
							FROM `libro` WHERE `ID` = ".$_GET['ID']);

							$libro = mysqli_fetch_array($consulta);
								?>

						<tr style="border: none;">
							<td style="border: none;"><img src="/php/<?php echo $libro['Imagen'];?>" alt="imagen libro 1" class="center"></td>
							<td style="border: none; vertical-align: middle;" class="centerT">
								<?php echo $libro['Titulo']. "<br><br>". $libro['Autor'];?>
							</td>
						</tr>
						<tr>
							<td style="border: none;" class="centerT">
								<?php echo $libro['Idioma']?>
							</td>
							<td style="border: none;" class="centerT">
								<?php if ($libro['Leido']){ ?>
								<input type="radio" id="read" name="read" value="read" disabled checked>
								<label class="checks"> Leido </label>
								<input type="radio" id="unread" name="read" value="unread" disabled>
								<label class="checks"> No Leido </label>
								<?php } else {?>
								<input type="radio" id="read" name="read" value="read" disabled>
								<label class="checks"> Leido </label>
								<input type="radio" id="unread" name="read" value="unread" disabled checked>
								<label class="checks"> No Leido </label>
								<?php }
								if ($libro['Favorito']) {?>
								<input type="radio" id="favorites" name="favorites" value="favorites" disabled checked>
								<label class="checks"> Favorito </label>
								<?php } else {?>
								<input type="radio" id="favorites" name="favorites" value="favorites" disabled>
								<label class="checks"> Favorito </label>
								<?php } ?>
							</td>
						</tr>
						<tr>
							<td style="border: none;" class="centerT"> Descripcion </td>
						</tr>
						<tr>

							<td style="border: none;" class="centerT">
								<?php echo $libro['Descripcion']?>
							</td>
						</tr>
						<?php
							mysqli_close($con);
							?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</body>

</html>
