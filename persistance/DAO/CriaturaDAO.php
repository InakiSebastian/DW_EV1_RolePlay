<?php

require_once (dirname(__FILE__) . '\..\..\PersistentManager.php');

class CriaturaDAO {

    const CRIATURA_TABLE = 'creature';

    private $conex = null;
    
     public function __construct() {
        $this->conex = PersistentManager::getInstance()->get_connection();
    }
}

?>