<?php

$_loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_loginController->comprobarUser();
}

class LoginController {

    public function __construct() {
        
    }

    public function comprobarUser() {

        if ($_POST["inputUser"] == "test" && $_POST["inputPassword"] == "1234") {

            header('Location: ../views/private/index.php');
        } else {
            header('Location: ../views/public/login.php?error=ErrorLogin');
        }
    }
}
?>


