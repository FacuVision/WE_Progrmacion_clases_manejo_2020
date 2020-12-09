<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="../LIBRERIAS/css/login_css.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../LIBRERIAS/js/login_js.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					 
					<img src="../LIBRERIAS/images/logo.jpeg" alt="AVATAR" style="margin-left:50px; margin-top:50px">
					
				</div> 
				<form class="login100-form validate-form" method="post" action="../CONTROLADORES/SesionesControlador.php">

				<input type=hidden value="1" name="op">
					<span class="login100-form-title">
						BIENVENIDO
					</span>
					<div style="margin-bottom:15px; text-align:center">
								Fecha: <?php  echo date('d-m-yy')?>
							</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="correo" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
						</span>
						<a class="txt2" href="#">
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							 
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	
</body>
</html>