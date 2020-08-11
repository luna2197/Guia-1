<?php
session_start();

if(isset($_SESSION['admin'])){

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
  <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Principal</h3>

      </div>
      <div class="card-body">

<form action="../index.php"  method="post" ">
            <br>
          <div class="input-group form-group">
            <div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Bienvenido <?php echo $_SESSION["admin"]; ?>!</h4>
  <p>  </p>

  <hr>
  <p class="mb-0">Nos alegra tenerte de regreso!.</p>
</div>

            
          </div>
         
          <div class="form-group">
            <input type="submit" value="Log out" name="ingresar" id="ingresar" class="btn float-right login_btn">
          </div>



</form>
      </div>
      
    </div>
  </div>
</div>
</html>




<?php }
else{ ?>
  <script type="text/javascript">
        window.onload = () => {
            alert("ERROR: Acceso Denegado!");
        }
  window.location.href='../index.php';
  </script>
  <?php
}
?>