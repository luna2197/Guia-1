<?php
 if(!empty($_POST)) {
        // validation errors
        $userError = null;
        $contraError = null;
        $contra2Error = null;
        $DatosError = null;
        $IgualError  = null;

        // post values
        $user = $_POST['user'];
        $contra = $_POST['contra'];        
        $contra2 = $_POST['contra2'];

        // validate input
        $valid = true;
        if(empty($user)) {
            $userError = "Por favor ingrese el usuario.";
            $valid = false;
        }
        
        if(empty($contra)) {
            $contraError = "Por favor ingrese la contraseña.";
            $valid = false;
        }
        if (empty($contra2)) {
            $contra2Error = "Por favor confirme la contraseña.";
            $valid = false;
        }
        
        if ($contra != $contra2) {
        	$DatosError = "Las contraseñas no son iguales.";
            $valid = false;
        }
        //Verificando si ya existe el usuario
        require("db.php");
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario where user= :u ";
        $stmt = $cn->prepare($sql);
        $user = htmlentities(addslashes($_POST["user"]));
        $stmt->bindValue(":u", $user);
        $stmt->execute();
        $count =$stmt->rowCount();

        if ($count != 0) {
        	$IgualError = "El usuario ya existe.";
        	$valid = false;
        }


        // insert data
        if($valid) {

            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO usuario(user, contra) values(?, ?)";
            $stmt = $cn->prepare($sql);
            $cifrado = password_hash ($contra, PASSWORD_DEFAULT) ; 
            $stmt->execute(array($user, $cifrado));
            $cn = null;

            header("Location: ../index.php");

        }
    }
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
  
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Nuevo Usuario</h3>
			</div>
			<div class="card-body">
				<form method="post">
                    <?php print(!empty($userError)?"<span  class='alert alert-danger' role='alert'>$userError</span>":""); ?>
                        <?php print(!empty($IgualError)?"<span class='text-danger' >$IgualError</span>":"");?>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control"  id="user" name="user" placeholder="Usuario">
                        						
					</div>

                    <?php print(!empty($contraError)?"<span class='text-danger'>$contraError</span>":""); ?>    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="contra" name="contra" placeholder="Contraseña" minlength="6">
						
					</div>

                    <?php print(!empty($contra2Error)?"<span class='text-danger'>$contra2Error</span>":""); ?>
                        <?php print(!empty($DatosError)?"<span class='text-danger'>$DatosError</span>":""); ?>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" id="contra2" name="contra2" placeholder="Confirmar contraseña" minlength="6">
						
					</div>

					<br>
					<div class="form-group">
						<input type="submit" value="Registrar" class="btn float-lefth login_btn" id="submit" name="submit">
						<a href='../index.php' class="btn float-lefth login_btn">Regresar</a>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>