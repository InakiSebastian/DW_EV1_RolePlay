<?php

require_once dirname(__FILE__) . '\..\..\persistance\DAO\CriaturaDAO.php';

class CriaturaController {

    public function __construct() {
        
    }
    
    function obtenerListaCriaturas(){
        $criaturaDAO = new CriaturaDAO();
        return $criaturaDAO->selectTodasLasCriaturas();
    }
}

?>