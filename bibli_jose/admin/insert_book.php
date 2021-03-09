<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarAdmin.php";
	require "../header_librarian.php";
?>

<html>
	<head>
		<title>Agregar Libro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body><br><br><br>
	<div class="row">
         <div class="col-md-7 mx-auto">
            <div class="myform form ">
		<form  method="POST" action="#">
		
		<div class="form-group">
		<div class=" alert-danger" id="error-message">
				<p id="error"></p>
			</div>
	
		<legend>Ingresa el nuevo libro</legend>
			
				
		<div class="form-group">
					<input class="form-control my-input" id="b_isbn" type="number" name="b_isbn" placeholder="ISBN"  required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="text" name="b_title" placeholder="Título" required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="text" name="b_author" placeholder="Autor" required />
				</div>
				
				<div>
				
				
				<div class="form-group ">
						<select class="form-control" name="b_category">
							<option>Ficción</option>
							<option>Aventura</option>
							<option>Política</option>
							<option>Drama</option>
						</select>
					</p>
				</div>
				
				<div class="form-group">
					<input class="form-control my-input"type="number" name="b_price" placeholder="Precio" required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="number" name="b_copies" placeholder="Número de Copias" required />
				</div>
				<div class="form-group">
					<textarea rows="4" cols="50" class="form-control my-input" type="number" name="b_descripcion" placeholder="descripcion" required ></textarea>
				</div>
				
				<br />
				<button class="btn btn-primary" type="submit" name="b_add" value="Agregar">Agregar</button> 
				<button class="btn btn-light"><a href="home.php">Volver
				
				</a></button>
		</form>
</div>
	<body>
	
	<?php

	
		if(isset($_POST['b_add']))
		{
			$prueba = 'fotos/sin.png';
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			
			if(mysqli_num_rows($query->get_result()) != 0)
				echo error_with_field("Ya existe un libro con ese ISBN", "b_isbn");
			else
			{
				
				$query = $con->prepare("INSERT INTO book VALUES(?, ?, ?, ?, ?,?, ?,?);");
				$query->bind_param("ssssddss", $_POST['b_isbn'], $_POST['b_title'], $_POST['b_author'], $_POST['b_category'], $_POST['b_price'], $_POST['b_copies'], $prueba,$_POST['b_descripcion']);
				
				if(!$query->execute())
					die(error_without_field("Error no se ha podido insertar libro"));
				echo success("<div class='alert-success'>Libro agregado correctamente</div>");
			}
		}

	?>
</html>