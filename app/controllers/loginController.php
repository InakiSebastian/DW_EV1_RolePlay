<?php

require_once (dirname(__FILE__) . '\..\..\utils\SessionUtils.php');
$_loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_loginController->comprobarUser();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $_loginController->logout();
}

class LoginController {

    public function __construct() {
        
    }

    public function comprobarUser() {

        if ($_POST["inputUser"] == "test" && $_POST["inputPassword"] == "1234") {
            SessionUtils::setSession($_POST["inputUser"]);
            header('Location: ../views/private/index.php');
        } else {
            header('Location: ../views/public/login.php?error=ErrorLogin');
        }
    }

    public function logout() {

        SessionUtils::destroySession();
        header('Location: ../views/public/index.php');
    }
}
?>


