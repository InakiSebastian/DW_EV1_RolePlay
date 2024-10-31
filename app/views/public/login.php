<?php
require_once dirname(__FILE__) . '\..\templates\header.php';

if (isset($_GET["error"]) && $_GET["error"] == "ErrorLogin"){
    $error = "Credenciales Incorrectas";
    
}

?>

<form class="p-4" method="POST" action="../../controllers/loginController.php">
  <div class="form-group mb-3">
    <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Introduce USER">
  </div>
  <div class="form-group mb-3">
    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
 <?php 
 if (isset($error)) {
     echo "<b style='color:red;'>". $error."</b>";
 }
 ?>
</form>