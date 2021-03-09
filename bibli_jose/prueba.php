<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<form method="post" action="#">
Introduce tu sexo:<br>
<input type="radio" value="hombre" name="sexo"> Hombre
<input type="radio" value="mujer" name="sexo"> Mujer <br>
<input type="submit" value="Enviar" />
<input type="reset" value="Restablecer" />
</form>
</body>
</html>
<?php
$sexo=@$_POST['sexo'];
if ($sexo == null)
{
echo "Debes introducir tu sexo :$<br>";
}
else {
echo "Tu sexo es ".$sexo.".<br>";
}
echo "<a href='formsexo.html'>Volver al formulario</a>";