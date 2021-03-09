<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarAdmin.php";
	require "../header_librarian.php";
?>

<html>
	<head>
		<title>Pending Book Requests</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body><br><br><br><br>
	<div class="container-fluid">
	<div class="table-responsive">
		<?php
			$query = $con->prepare("SELECT * FROM pending_book_requests;");
			$query->execute();
			$result = $query->get_result();;
			$rows = mysqli_num_rows($result);
			if($rows == 0)
				echo "<h2 align='center'>Sin solicitudes pendientes</h2>";
			else
			{
				echo "<form class='cd-form' method='POST' action='#'>";
				echo "<legend>Solicitudes de Libros Pendientes</legend>";
				echo "<div class=' alert-danger'  id='error-message'>
						<p id='error'></p>
					</div>";
					echo "<table class='table  table-hover' ><thead class='table-dark';
						<tr>
							<th>Indicar</th>
							<th>Usuario<hr></th>
							<th>Libro<hr></th>
							<th>Fecha<hr></th>
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
					for($j=1; $j<4; $j++)
						echo "<td>".$row[$j]."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<br /><br /><div style='float: right;'>";
				echo "<button  class='btn btn-light' type='submit' value='Rechazar selección' name='l_reject' />Rechazar solicitud</button>";
				echo "<button  class='btn btn-primary' type='submit' value='Aceptar selección' name='l_grant'/>Aceptar solicitud</button>";
				echo "</div>";
				echo "</form>";
			}
			
			$header = 'From: <noreply@library.com>' . "\r\n";
			
			if(isset($_POST['l_grant']))
			{
				$requests = 0;
				for($i=0; $i<$rows; $i++)
				{
					if(isset($_POST['cb_'.$i]))
					{
						$request_id =  $_POST['cb_'.$i];
						$query = $con->prepare("SELECT member, book_isbn FROM pending_book_requests WHERE request_id = ?;");
						$query->bind_param("d", $request_id);
						$query->execute();
						$resultRow = mysqli_fetch_array($query->get_result());
						$member = $resultRow[0];
						$isbn = $resultRow[1];
						$query = $con->prepare("INSERT INTO book_issue_log(member, book_isbn) VALUES(?, ?);");
						$query->bind_param("ss", $member, $isbn);
						if(!$query->execute())
							die(error_without_field("ERROR: Nos se pudo emitir el libro"));
						$requests++;
						
						$query = $con->prepare("SELECT email FROM member WHERE username = ?;");
						$query->bind_param("s", $member);
						$query->execute();
						$to = mysqli_fetch_array($query->get_result())[0];
						$subject = "Libro emitido con éxito";
						
						$query = $con->prepare("SELECT title FROM book WHERE isbn = ?;");
						$query->bind_param("s", $isbn);
						$query->execute();
						$title = mysqli_fetch_array($query->get_result())[0];
						
						$query = $con->prepare("SELECT due_date FROM book_issue_log WHERE member = ? AND book_isbn = ?;");
						$query->bind_param("ss", $member, $isbn);
						$query->execute();
						$due_date = mysqli_fetch_array($query->get_result())[0];
						$message = "El libro '".$title."' con ISBN ".$isbn." ha sido emitido a su cuenta. La fecha de vencimiento para devolver el libro es ".$due_date.".";
						
						//mail($to, $subject, $message, $header);
					}
				}
				if($requests > 0)
					echo success("<div class='alert-success'>Libro aceptado  ".$requests." solicitud</div>");
				else
					echo error_without_field("Ninguna solicitud seleccionada");
			}
			
			if(isset($_POST['l_reject']))
			{
				$requests = 0;
				for($i=0; $i<$rows; $i++)
				{
					if(isset($_POST['cb_'.$i]))
					{
						$requests++;
						$request_id =  $_POST['cb_'.$i];
						
						$query = $con->prepare("SELECT member, book_isbn FROM pending_book_requests WHERE request_id = ?;");
						$query->bind_param("d", $request_id);
						$query->execute();
						$resultRow = mysqli_fetch_array($query->get_result());
						$member = $resultRow[0];
						$isbn = $resultRow[1];
						
						$query = $con->prepare("SELECT email FROM member WHERE username = ?;");
						$query->bind_param("s", $member);
						$query->execute();
						$to = mysqli_fetch_array($query->get_result())[0];
						$subject = "Problema de libro rechazado";
						
						$query = $con->prepare("SELECT title FROM book WHERE isbn = ?;");
						$query->bind_param("s", $isbn);
						$query->execute();
						$title = mysqli_fetch_array($query->get_result())[0];
						$message = "Su solicitud para emitir el libro. '".$title."' con ISBN ".$isbn." Ha sido rechazado. Puedes solicitar el libro nuevamente o visitar la librería para obtener más información.";
						
						$query = $con->prepare("DELETE FROM pending_book_requests WHERE request_id = ?");
						$query->bind_param("d", $request_id);
						if(!$query->execute())
							die(error_without_field("ERROR: No se pudieron eliminar los valores"));
						
						//mail($to, $subject, $message, $header);
					}
				}
				if($requests > 0)
					echo success("Exitósame eliminado ".$requests." registro");
				else
					echo error_without_field("Ninguna solicitud seleccionada");
			}
			?>
			</div>
			</div>
		</body>
	</html>