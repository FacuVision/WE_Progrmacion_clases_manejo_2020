<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Administrador</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../LIBRERIAS/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LIBRERIAS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LIBRERIAS/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../LIBRERIAS/css/util.css">
	<link rel="stylesheet" type="text/css" href="../LIBRERIAS/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<form  method="get" action="../CONTROLADORES/SesionesControlador.php">

	<input type=hidden value="1" name="op">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="form" method="post">
					<span class="login100-form-title p-b-70">
						Bienvenido
					</span>
					
					<span class="login100-form-avatar">
						<img src="../LIBRERIAS/images/avatar-01.png" alt="AVATAR">
					</span>
<!-- ZONA DE LOGIN  --------------------------------------------------------------------------------->
					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Ingresa correo">
						<input class="input100" type="email" required  autocomplete="off" name="correo">
						<span class="focus-input100" data-placeholder="Correo"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Ingresa contraseña">
						<input class="input100" type="password"  required  autocomplete="off"name="pass">
						<span class="focus-input100" data-placeholder="Contraseña"></span>
					</div>

					<div class="container-login100-form-btn">
						<input  type="submit" class="login100-form-btn" value="login">
							<div style="margin-top:50px">
								Fecha: <?php echo date('d-m-yy')?>
							</div>
					</div>

						<ul class="login-more p-t-190">
							<li class="m-b-8">
								<span class="txt1">
									
								</span>

								<a href="#" class="txt2">
									
								</a>
							</li>

							<li>
								<span class="txt1">
								
								</span>

								<a href="#" class="txt2">
									
								</a>
							</li>
						</ul>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../LIBRERIAS/js/main.js"></script>
</form>
</body>
</html>