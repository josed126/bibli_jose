<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarCliente.php";
	require "cabezera.php";
	session_start();
?>

<html>
	<head>
		<title>Bienvenido</title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
			#color { margin: 10px 0; }
			#color:nth-child(2) {margin-bottom: 50px;}
			#color div[class*='col'] { padding: 10px; text-align: center; border: 1px solid;}
		</style>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
	</div>
	
    
<br><br><br>
	<?php
	
			$busqueda=@$_POST['busqueda'];
			$busqueda2=@$_POST['busqueda2'];
			$busqueda3=@$_POST['busqueda3'];
			/*if (empty($busqueda)) {
				$busqueda = '';
			}
			*/
		
			$query = $con->prepare("SELECT * FROM book WHERE title LIKE  '$busqueda%' and category like '%$busqueda2%' and author like '%$busqueda3%' ;");
			
				
			//$query2->execute();
			
			$query->execute();
			$result = $query->get_result();
			if(!$result)
				die("Error de libros");
			$rows = mysqli_num_rows($result);
			
			
				echo "<form class='cd-form' method='POST' action='#'>";
				echo "<h2 class='p-2 bg-success text-white' align='center'>Libros disponibles</h2>";
				?><div class="container-fluid">
					
				<section class="principal">
			
				<div class="row justify-content-center">
				<h3>Filtro de Búsqueda </h3>
				</div>
				<br>
				<div class="row justify-content-center">
				 <form class="form-inline" action="/action_page.php">
    <div class="form-group">

	  <input  type="text" name="busqueda" placeholder="Titulo" value="" class="form-control my-input"  />
    </div>
	<div class="form-group">

	  <input  type="text" name="busqueda3" placeholder="Autor" value="" class="form-control my-input"  />
    </div>
    <div class="form-group">
     
	  <div class="form-group ">
						<select class="form-control" name="busqueda2">
						<option value="">Selecciona Género.</option>
							<option>Ficción</option>
							<option>Aventuras</option>
							<option>Deportes</option>
							<option>Drama</option>
						</select>
					</p>
				</div>
				
  
  </div>
  <div class="form-group">

	<input type="submit" class="btn btn-dark" value="Buscar" />

	
	</div>
  </form>
			
			</div><?php
				
				echo "<div class=' alert-danger' id='error-message'>
						<p id='error'></p>
					</div>";
				echo '<div class="row" id="color">';
				
				for($i=0; $i<$rows; $i++)
				{
					
					echo '<div class=" col-sm-12 col-md-6 col-lg-3">';
					$row = mysqli_fetch_array($result);
					echo '<h5><ins>'.$row[1].'</ins></h5>';
					
					echo '<img class="mt-3"  src="'.$row[6].'" width: 100px; height: 100px; ><br>';
					echo "
							<div>
								
							<label class='control control--radio'>
							<button type='button' class='login100-form-btn mt-3' data-toggle='modal' data-target='#exampleModal";echo $i; echo"'>
  Alquilar
</button>

<!-- Modal -->
<div class='modal fade' id='exampleModal";echo $i; echo"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Alquiler de Libros</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
	  <strong>¿Estas seguro de alquilar el libro $row[1] por $row[4]€?</strong>
      </div>
      <div class='modal-footer'>
	  <button type='submit' class='btn btn-success' name='rd_book' value=".$row[0]." >Alquilar</button>
	  <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
  </div>

								
					
							</div>
							
					
							<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal";echo $i; echo"'>
							Ver Datos
						  </button><div class='modal' id='myModal"; echo $i; echo"'>
						  <div class='modal-dialog'>
							<div class='modal-content'>
							
							  <!-- Modal Header -->
							  <div class='modal-header'>
								<h4 class='modal-title'>$row[1]</h4>
								<button type='button' class='close' data-dismiss='modal'>&times;</button>
							  </div>
							  
							  <!-- Modal body -->
							  <div class='modal-body'>
							  <div class='row'>
							  <div class='col-md-6'>";
							  
            
           
							  echo '<img class="mt-3"  src="'.$row[6].'"><br></div><div class="col-md-6">';
							 echo "<div> <strong> Autor:  </strong> ".$row[2]."</div>";
							echo "<div> <strong>Género:  </strong> ".$row[3]."</div>";
							echo "<div> <strong>Precio: </strong> ".$row[4]."€</div>";
							echo "<div> <strong>Libros disponibles: </strong> ".$row[5]."<button type='button' class='btn btn-primary mt-1' data-toggle='collapse' data-target='#demo'>Sinopsis</button><button type='button' class='btn btn-primary mt-1' data-toggle='collapse' data-target='#demo2'>Sugerencia</button></div>";
							echo "
  
							<div id='demo' class='collapse'>".$row[7]."</div><div class='rw-ui-container'></div>";
							$genero = $row[3];
							
							$query2 = $con->prepare("SELECT title,des FROM `book` WHERE category =   '$genero' ORDER BY RAND();");
							$query2->execute();
							$result2 = $query2->get_result();
						
							$rows2 = mysqli_num_rows($result2);
							
			$row2 = mysqli_fetch_array($result2 );	echo "<div id='demo2' class='collapse'><div> <strong>    ".$row2[0]."</strong></div><img class='mt-3'  src=".$row2[1]." width: 100px; height: 100px; ></div>";
							 echo "</div>
							
							  
							  <!-- Modal footer -->
							  <div class='modal-footer'>
							  <div>
								<label class='control control--radio'>
								
								<label class='control control--radio'>
							<button type='button'class='btn btn-success' data-toggle='modal' data-target='#exampleModal2";echo $i; echo"'>
  Alquilar
</button>

<!-- Modal -->
<div class='modal fade' id='exampleModal2";echo $i; echo"' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Alquiler de Libros</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
	  <strong>¿Estas seguro de alquilar el libro '$row[1]' por $row[4]€?</strong>
      </div>
      <div class='modal-footer'>
	  <button type='submit' class='btn btn-success' name='rd_book' value=".$row[0]." >Alquilar</button>
	  <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
  </div>
								<button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
					
							</div>
								
								
							  </div>
							  </div>
							</div>
							</div>
						  </div>
						  </div>
						
						</div>";
						
					
				
				}
			echo 	"</div>";
				
			
			
			
	
			
			
				if(empty($_POST['rd_book']))
					echo error_without_field("");
				else
				{
					$query = $con->prepare("SELECT copies FROM book WHERE isbn = ?;");
					$query->bind_param("s", $_POST['rd_book']);
					$query->execute();
					$copies = mysqli_fetch_array($query->get_result())[0];
					if($copies == 0)
						echo error_without_field("No hay libros disponibles del libro seleccionado.");
					else
					{
						$query = $con->prepare("SELECT request_id FROM pending_book_requests WHERE member = ?;");
						$query->bind_param("s", $_SESSION['username']);
						$query->execute();
						if(mysqli_num_rows($query->get_result()) == 10)
							echo error_without_field("Solo puedes sacar un maximo de 10 libros");
						else
						{
							$query = $con->prepare("SELECT book_isbn FROM pending_book_requests WHERE member = ?;");
							$query->bind_param("s", $_SESSION['username']);
							$query->execute();
							$result = $query->get_result();
							if(mysqli_num_rows($result) >= 3)
								echo error_without_field("No puedes emitir más de 3 libros a la vez");
							else
							{
								$rows = mysqli_num_rows($result);
								for($i=0; $i<$rows; $i++)
									if(strcmp(mysqli_fetch_array($result)[0], $_POST['rd_book']) == 0)
										break;
								if($i < $rows)
									echo error_without_field("Ya ha solicitado una copia de este libro.");
								else
								{
									$query = $con->prepare("SELECT balance FROM member WHERE username = ?;");
									$query->bind_param("s", $_SESSION['username']);
									$query->execute();
									$memberBalance = mysqli_fetch_array($query->get_result())[0];
									
									$query = $con->prepare("SELECT price FROM book WHERE isbn = ?;");
									$query->bind_param("s", $_POST['rd_book']);
									$query->execute();
									$bookPrice = mysqli_fetch_array($query->get_result())[0];
									if($memberBalance < $bookPrice)
										echo error_without_field("No tiene el saldo suficiente para emitir este libro.");
									else
									{
										$query = $con->prepare("INSERT INTO pending_book_requests(member, book_isbn) VALUES(?, ?);");
										$query->bind_param("ss", $_SESSION['username'], $_POST['rd_book']);
										if(!$query->execute())
											echo error_without_field("ERROR: No se pudo solicitar el libro");
										else
											echo success("<div class='alert-success' >Libro solicitado con éxito.</div>");
									}
								}
							}
						}
					}
				}
			
		?>
	<script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "473462",
            uid: "098cc0cfade1a70b3af12c9373b2529a",
            source: "website",
            options: {
                "advanced": {
                    "layout": {
                        "align": {
                            "hor": "center",
                            "ver": "top"
                        }
                    }
                },
                "size": "medium",
                "style": "oxygen",
                "isDummy": false
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>
	<body>
	
  

</section>

		<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>