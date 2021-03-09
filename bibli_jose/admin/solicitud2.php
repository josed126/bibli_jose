<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarAdmin.php";
	require "../header_librarian.php";
?>

<html>
	<head>
		<title>Solicitudes de Registro Pendientes</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body><br><br><br>
	<div class="container-fluid">
	<div class="table-responsive">
		<?php
			$query = $con->prepare("SELECT username, name, email, balance FROM pending_registrations");
			$query->execute();
			$result = $query->get_result();
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>Sin solicitudes de registro pendientes</h2>";
			else
			{
				echo "<form class='cd-form' method='POST' action='#'>";
				echo "<legend>Solicitudes de Registro Pendientes</legend>";
				echo "<div class=' alert-danger' id='error-message'>
						<p id='error'></p>
					</div>";
					echo "<table class='table  table-hover' ><thead class='table-dark';
						<tr>
							<th></th>
							<th>Usuario<hr></th>
							<th>Nombre<hr></th>
							<th>Correo<hr></th>
							<th>Balance<hr></th>
						</tr></thead>";
				for($i=0; $i<$rows; $i++)
				{
					$row = mysqli_fetch_array($result);
					echo "<tr>";
					echo "<td>
							<label class='control control--checkbox'>
								<input type='checkbox' name='cb_".$i."' value='".$row[0]."' />
								<div class='control__indicator'></div>
							</label>
						</td>";
					$j;
					for($j=0; $j<3; $j++)
						echo "<td>".$row[$j]."</td>";
					echo "<td>".$row[$j]."€</td>";
					echo "</tr>";
				}
				echo "</table><br /><br />";
				echo "<div style='float: right;'>";
				echo "<button  class='btn btn-light' type='submit' value='Eliminar Selección' name='l_delete' />Denegar Usuario</button>";
				echo "<button  class='btn btn-primary' type='submit' value='Confirmar Selección' name='l_confirm' />Aceptar Usuario</button>";
				echo "</div>";
				echo "</form>";
			}
			
			$header = 'From: <noreply@library.com>' . "\r\n";
			
			if(isset($_POST['l_confirm']))
			{
				$members = 0;
				for($i=0; $i<$rows; $i++)
				{
					if(isset($_POST['cb_'.$i]))
					{
						$username =  $_POST['cb_'.$i];
						$query = $con->prepare("SELECT * FROM pending_registrations WHERE username = ?;");
						$query->bind_param("s", $username);
						$query->execute();
						$row = mysqli_fetch_array($query->get_result());
						
						$query = $con->prepare("INSERT INTO member(username, password, name, email, balance) VALUES(?, ?, ?, ?, ?);");
						$query->bind_param("ssssd", $username, $row[1], $row[2], $row[3], $row[4]);
						if(!$query->execute())
							die(error_without_field("ERROR: No se pudieron insertar valores"));
						$members++;
						
					
					}
				}
				if($members > 0)
					echo success("<div class='alert-success'>Exitosamente agregado ".$members." miembro</div>");
				else
					echo error_without_field("Ningún registro seleccionado");
			}
			
			if(isset($_POST['l_delete']))
			{
				$requests = 0;
				for($i=0; $i<$rows; $i++)
				{
					if(isset($_POST['cb_'.$i]))
					{
						$username =  $_POST['cb_'.$i];
						$query = $con->prepare("SELECT email FROM pending_registrations WHERE username = ?;");
						$query->bind_param("s", $username);
						$query->execute();
						$email = mysqli_fetch_array($query->get_result())[0];
						
						$query = $con->prepare("DELETE FROM pending_registrations WHERE username = ?;");
						$query->bind_param("s", $username);
						if(!$query->execute())
							die(error_without_field("ERROR: No se pudieron eliminar los valores"));
						$requests++;
						
					
					}
				}
				if($requests > 0)
					echo success("Eliminado Exitosamente ".$requests." Registro");
				else
					echo error_without_field("No se seleccionó ningún registro");
			}
		?>
			</div>
			</div>
		</body>
	</html>