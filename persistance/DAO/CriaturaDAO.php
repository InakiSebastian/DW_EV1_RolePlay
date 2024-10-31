<?php

require_once (dirname(__FILE__) . '\..\PersistentManager.php');
require_once (dirname(__FILE__) . '\..\..\app\models\Criatura.php');

class CriaturaDAO {

    const CRIATURA_TABLE = 'creature';

    private $conex = null;

    public function __construct() {
        $this->conex = PersistentManager::getInstance()->get_connection();
    }

    public function selectTodasLasCriaturas() {

        $query = "SELECT * FROM " . self::CRIATURA_TABLE;
        $result = mysqli_query($this->conex, $query);
        $criaturas = array();

        while ($criatura = mysql_fetch_array($result)) {
            $criatura = new Criatura();
            $criatura->setIdCreature($criatura['idCreature']);
            $criatura->setName($criatura['name']);
            $criatura->setDescription($criatura['description']);
            $criatura->setAvatar($criatura['avatar']);
            $criatura->setAttackPower($criatura['attackPower']);
            $criatura->setLifeLevel($criatura['lifelevel']);
            $criatura->setWeapon($criatura['weapon']);

            array_push($criaturas, $criatura);
        }

        return $criaturas;
    }

    public function selectCriaturaByID($id) {
        $query = "SELECT * FROM " . self::CRIATURA_TABLE . " where ID =?";
        $stmt = mysqli_prepare($this->conex, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $criaturaBD);
        $criatura = null;
        while (mysqli_stmt_fetch($stmt)) {
            $criatura = new Criatura();
            $criatura->setIdCreature($criaturaBD['idCreature']);
            $criatura->setName($criaturaBD['name']);
            $criatura->setDescription($criaturaBD['description']);
            $criatura->setAvatar($criaturaBD['avatar']);
            $criatura->setAttackPower($criaturaBD['attackPower']);
            $criatura->setLifeLevel($criaturaBD['lifelevel']);
            $criatura->setWeapon($criaturaBD['weapon']);
        }
        
        return $criatura;
    }
}

?>