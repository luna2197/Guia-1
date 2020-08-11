<?php
session_start();

if(isset($_SESSION['admin'])){
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>

			</div>
			<div class="card-body">

<form action="PHP/redireccion.php"  method="post" ">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control"  id="usuario" name="usuario" placeholder="Usuario" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Contraseña" required>
					</div>
					<br>
					<div class="form-group">
						<input type="submit" value="Ingresar" name="ingresar" id="ingresar" class="btn float-right login_btn">
					</div>



</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					No tienes una cuenta?<a href="PHP/registrar.php">Sign Up</a>
				</div>
				
			</div>
		</div>
	</div>
</div>
</html>