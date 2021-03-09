<?php
	require "../db_connect.php";
	require "verificarAdmin.php";
	require "../header_librarian.php";
?>

<html>
	<head>
		<title>Bienvenido Administrador</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"><link rel="stylesheet" href="css/main.css">
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
	<body><br><br><br>
	<div class="container">

    <h1>Administrador</h1>
     
    <br>
    <div class="content">
	<a href="solicitud2.php" class="btn">
        <span class="left icon icon-tablet"></span>
        <span class="right title">Solicitudes  Pendientes</span>
      </a> 
      
      <a href="solicitud1.php" class="btn">
        <span class="left title">Solicitudes libros</span>
        <span class="right icon icon-tablet"></span>
      </a>
    </div>
    <br>
    <div class="content">
    <a href="insert_book.php"class="btn left">
        <span class="left icon icon-heart"><span class="arrow-left"></span></span>
        <span class="right title">Agregar nuevo libro</span>
      </a>

      <a href="actualizarAdmin.php" class="btn right">
        <span class="left title">Actualizar copias</span>
        <span class="right icon icon-heart"><span class="arrow-right"></span></span>
      </a>
    </div>
    <br>
    
      
      <a href="../logout.php" class="btn right">
        <span class="left title"><span class="arrow-left"></span>Salir</span>
        <span class="right icon icon-gear"></span>
      </a>
    </div>
    
	</body>
</html>