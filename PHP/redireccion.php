<?php
if(isset($_POST['ingresar']))
//conection
require("db.php");
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario where user= :user";
        $stmt = $cn->prepare($sql);
        $user = htmlentities(addslashes($_POST["usuario"]));//Evitar inyecciones sql del input
        $stmt->bindValue(":user", $user);
        $stmt->execute();
        $count =$stmt->rowCount();//La variable cuenta las filas devueltas del array
        	   

        $data = $stmt->fetch(PDO::FETCH_ASSOC);// almancenando el array de la consulta 


        $pass = htmlentities(addslashes($_POST["contraseña"]));//Evitar inyecciones sql del input

        //Verificando el usuario
        if($count != 0) {

      //almancenando datos en usario en una cookie
			$id = $data['user'];
			$cookie_name = "usuario";
			$cookie_value = $id;

			session_start();

			setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 86400 = 1 día
    		 
                  
        }

          //verificando la contraseña encriptada de la base coincida con el del inpuy
        if (password_verify($pass, $data['contra'])) {
            $_SESSION['admin'] = $data['user'];//Almacenando datos del usuario
         header("Location: Principal.php");//Ingresando a la pagina principal
        }

else { ?>

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
  <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>

      </div>
      <div class="card-body">

<form action="../index.php"  method="post" ">
            <br>
          <div class="input-group form-group">
            <div class="alert alert-warning" role="alert">
  Usuario o contraseña incorrecta!
</div>
            
          </div>
         
          <div class="form-group">
            <input type="submit" value="Regresar" name="ingresar" id="ingresar" class="btn float-right login_btn">
          </div>



</form>
      </div>
      
    </div>
  </div>
</div>
</html>
<?php } ?>