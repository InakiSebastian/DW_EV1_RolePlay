<?php

require_once dirname(__FILE__) . '\..\..\persistance\DAO\CriaturaDAO.php';
require_once dirname(__FILE__). '\..\models\Criatura.php';

$_criaturaController = new CriaturaController;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "crear") {
        $_criaturaController->crearCriatura();
    } else if ($_POST["type"] == "editar") {
        $_criaturaController->editarCriatura();
    }
}

class CriaturaController {

    public function __construct() {
        
    }
    
    public function editarCriatura() {
        $criatura = new CriaturaDao();
        $criaturaDao = new CriaturaDAO();
        $criatura = new Criatura();
        $criatura->setName($_POST["inputName"]);
        $criatura->setDescription($_POST["inputDescription"]);
        $criatura->setAvatar($_POST["inputAvatar"]);
        $criatura->setLifeLevel($_POST["inputLife"]);
        $criatura->setAttackPower($_POST["inputAttack"]);
        $criatura->setWeapon($_POST["inputWeapon"]);
       $criatura->setIdCreature($_POST["id"]);
        $criaturaDao->updateCriatura($criatura);
        header('Location: ../views/private/index.php');
        
        
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
        header('Location: ../views/private/index.php');
        
        
    }

    function obtenerListaCriaturas() {
        $criaturaDAO = new CriaturaDAO();
        return $criaturaDAO->selectTodasLasCriaturas();
    }
    
    function obtenerPorId($id){
        $criaturaDAO = new CriaturaDAO();
        return $criaturaDAO->selectCriaturaByID($id);
    }
}

?>