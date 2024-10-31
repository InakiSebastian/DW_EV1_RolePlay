<?php

require_once dirname(__FILE__) . '\..\..\persistance\DAO\CriaturaDAO.php';

$_criaturaController = new CriaturaController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "crear") {
        $_criaturaController->crearCriatura();
    } else if ($_POST["type"] == "editar") {
        
    }
}

class CriaturaController {

    public function __construct() {
        
    }

    public function crearCriatura() {
        $criaturaDao = new CriaturaDAO();
        $criatura = new Criatura();
        $criatura->setName($_POST["inputName"]);
        $criatura->setDescription($_POST["inputDescription"]);
        $criatura->setAvatar($_POST["inputAvatar"]);
        $criatura->setLifeLevel($_POST["inputLife"]);
        $criatura->setAttackPower($_POST["inputAttack"]);
        $criatura->setWeapon($_POST["inputWeapon"]);
        
        $criaturaDao->insertCriatura($criatura);
        header('Location: ../views/public/index.php');
        
        
    }

    function obtenerListaCriaturas() {
        $criaturaDAO = new CriaturaDAO();
        return $criaturaDAO->selectTodasLasCriaturas();
    }
}

?>