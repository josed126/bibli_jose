<?php
	require "../db_connect.php";
	require "../mensaje.php";
	require "verificarCliente.php";
	require "cabezera.php";

	
?>
<?php
	session_start();
if(isset($_POST['m_add']))
{
	$query = $con->prepare("SELECT username FROM member WHERE username = ?;");
	$query->bind_param("s", $_POST['m_user']);
	$query->execute();
	if(mysqli_num_rows($query->get_result()) != 1)
		echo error_with_field("Usuario inválido", "m_user");
	else
	{
		$query = $con->prepare("UPDATE member SET balance = balance + ? WHERE username = ?;");
		$query->bind_param("ds", $_POST['m_balance'], $_POST['m_user']);
		
		if(!$query->execute())
			die(error_without_field("ERROR: No se pudo agregar saldo"));
		echo success("<div class='alert-success'>Actualizado daldo</div>");
		
		
		
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: home.php");
		
	}
}

?>
<html>
	<head>
		<title>Actualizar Saldo</title>
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->


	</head>
	<body><br><br>
		
		<div class="container-login100">
      <div class="col-md-10 mx-auto text-center">
	<div class="row">
         <div class="col-md-7 mx-auto">
            <div class="myform form ">
		<form class="cd-form" method="POST" action="#">
		<div class=" alert-danger" id="error-message">
				<p id="error"></p>
			</div>
			<div class="col-md-12 mx-auto text-center">
	
		
			
			<div class=" alert-danger" id="error-message">
				<p id="error"></p>
			</div>
			<div class="form-group ">
					<h3>Usuario que desees meter dinero:</h3>Nombre que desear meter dinero: <input class="form-control my-input col-12 " type='text' name='m_user' id="m_user"  placeholder="Nombre" required />
				</div>
</div>
			<div class="header-title">
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
	
				<br />
				<input type="submit" class="login100-form-btn"name="m_add" value="Pagar" />
		</form>
		
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/masking-input.js" data-autoinit="true"></script>

</html>