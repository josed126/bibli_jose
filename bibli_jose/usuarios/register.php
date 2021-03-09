<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "../header.php";
?>

<html>
	<head>
		<title>Reguistarte</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	
	
	</head>
	<body><br><br><br><br>
	<div>
		<div class="container-login100">
      <div class="col-md-10 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
              Registrate
            </h1>
            <h2 class="wv-heading--subtitle">
               Aqui puedes registrate
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mx-auto">
            <div class="myform form ">
		<form class="cd-form" method="POST" action="#">
		<div class=" alert-danger" id="error-message">
				<p id="error"></p>
			</div><br><br>
				
			<div class="form-group">
					<input class="form-control my-input"  type="text" name="m_user" id="m_user" placeholder="Usuario" required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="password" name="m_pass" placeholder="Contraseña" required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="text" name="m_name" placeholder="Nombre Completo" required />
				</div>
				<div class="form-group">
					<input  class="form-control my-input"  placeholder="Apellidos" required />
				</div>
				
				<div class="form-group">
					<input class="form-control my-input" type="email" name="m_email" id="m_email" placeholder="Correo" required />
				</div>
				
				
				<div class="col-md-12 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
           Datos de Pago
            </h1>
</div>
				<hr class="mb-4">
          <div class="card">
            <div class="card-header">
              <div class="row">
              Formas de Pago:        
				<div id="smart-button-container">
      
       
    
    </div>
	<div class="col-md-6 text-right" style="margin-top: -5px;  margin-left: -100px"> <img
				
				src="https://img.icons8.com/color/36/000000/visa.png"><img
				src="https://img.icons8.com/color/36/000000/mastercard.png"> <img
				src="https://img.icons8.com/color/36/000000/amex.png"> 
			</div>
			<div id="paypal-button-container"  style=" margin-left: 100px with:0.2em"></div>
			</div>
            </div>
			<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" ></script>
	
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'horizontal',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
  
              
            <div class="card-body" style="height: 350px">
              <div class="form-group"> <label for="cc-number" class="control-label">Número de tarjeta</label> <input
                  id="visa" type="tel" class="input-lg form-control cc-number" data-mask="0000-0000-0000-0000" autocomplete="cc-number" minlength="19"
                  placeholder="XXXX-XXXX-XXXX-XXXX"  required> </div>
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group"> <label for="cc-exp" class="control-label">Expiración tarjeta</label> 
                    <input id="cc" type="text" placeholder="MM/YY" class="masked form-control" pattern="(1[0-2]|0[1-9])\/(2[8-9]|2\d)" data-valid-example="12/20" minlength="5" required/>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group"> <label for="cc-cvc" class="control-label">CVC</label> <input id="cvc"
                      type="tel" class="input-lg form-control cc-cvc" placeholder="XXX" minlength="3"
                      data-mask="000" required> </div>
                </div>
				<div class="form-group col-md-12">
				<label for="cc-cvc" class="control-label">Depósito Inicial</label>
					<input class="form-control my-input" type="number" name="m_balance" id="m_balance" placeholder="Deposito Inicial" required />
				</div>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
              </div>
			  

            </div>
</div>
          </div>
      </div>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
				<br />
				<input type="submit" class="login100-form-btn"name="m_register" value="Registrarse" />
		</form>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>

	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>
	
	<?php
		if(isset($_POST['m_register']))
		{
			if($_POST['m_balance'] < 5)
				echo error_with_field("Debes de ingresar un minimo de 5 euros", "m_balance");
			else
			{
				$query = $con->prepare("(SELECT username FROM member WHERE username = ?) UNION (SELECT username FROM pending_registrations WHERE username = ?);");
				$query->bind_param("ss", $_POST['m_user'], $_POST['m_user']);
				$query->execute();
				if(mysqli_num_rows($query->get_result()) != 0)
					echo error_with_field("El usuario que has eleguido ya esta en el sistema ", "m_user");
				else
				{
					$query = $con->prepare("(SELECT email FROM member WHERE email = ?) UNION (SELECT email FROM pending_registrations WHERE email = ?);");
					$query->bind_param("ss", $_POST['m_email'], $_POST['m_email']);
					$query->execute();
					if(mysqli_num_rows($query->get_result()) != 0)
						echo error_with_field("El correo que has puesto ya esta en el sistema", "m_email");
					else
					{
						$query = $con->prepare("INSERT INTO pending_registrations(username, password, name, email, balance) VALUES(?, ?, ?, ?, ?);");
						$query->bind_param("ssssd", $_POST['m_user'], sha1($_POST['m_pass']), $_POST['m_name'], $_POST['m_email'], $_POST['m_balance']);
						if($query->execute())
							echo success("<div class='alert-success' >Enhorabuena, espera que el administrador te de permisos max: 24Horas</div>");
						else
							echo error_without_field("Error no se puede los datos");
					}
				}
			}
		}
	?>
	
</html>