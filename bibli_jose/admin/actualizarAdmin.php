<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarAdmin.php";
	require "../header_librarian.php";
	session_start();
?>

<html>
	<head>
		<title>Actualización de Copias</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_with_field("ISBN inválido", "b_isbn");
			else
			{
				$query = $con->prepare("UPDATE book SET copies = copies + ? WHERE isbn = ?;");
				$query->bind_param("ds", $_POST['b_copies'], $_POST['b_isbn']);
				if(!$query->execute())
					die(error_without_field("ERROR: No se pudieron agregar copias"));
				echo success("<div class='alert-success'>Copias actualizadas con éxito</div>");
				header("Location:index.php");
			}
		}
			
		
			
	?>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body><br><br><br>
	<div class="container">
      <div class="col-md-10 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
            Agregar
            </h1>
            <h2 class="wv-heading--subtitle">
               Aqui puedes aguegar los libros disponibles
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-7 mx-auto">
            <div class="myform form ">
		<form class="cd-form" method="POST" action="#">
		<div class=" alert-danger" id="error-message">
				<p id="error"></p>
			</div>
		<div class="form-group">
	
					<input class="form-control my-input" type='text' name='b_isbn' id="b_isbn" placeholder="ISBN del libro" required />
				</div>
					
				<div class="form-group">
					<input class="form-control my-input" type="number" name="b_copies" placeholder="Número de copias a agregar" required />
				</div>
						
				<button  class=" btn btn-block send-button tx-tfm" type="submit" name="b_add" value="Agregar copias" >Agregar copias</button>
		</form>
		
	</body>
	
	
</html>