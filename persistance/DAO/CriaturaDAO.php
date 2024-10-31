<?php

require_once (dirname(__FILE__) . '\..\conf\PersistentManager.php');
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

        while ($criaturaBD = mysqli_fetch_array($result)) {
            $criatura = new Criatura();
            $criatura->setIdCreature($criaturaBD['idCreature']);
            $criatura->setName($criaturaBD['name']);
            $criatura->setDescription($criaturaBD['description']);
            $criatura->setAvatar($criaturaBD['avatar']);
            $criatura->setAttackPower($criaturaBD['attackPower']);
            $criatura->setLifeLevel($criaturaBD['lifeLevel']);
            $criatura->setWeapon($criaturaBD['weapon']);

            array_push($criaturas, $criatura);
        }

        return $criaturas;
    }

    public function selectCriaturaByID($id) {
        $query = "SELECT * FROM " . self::CRIATURA_TABLE . " where idCreature=?";
        $stmt = mysqli_prepare($this->conex, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idCreature, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon);
        $criatura = null;
        while (mysqli_stmt_fetch($stmt)) {
            $criatura = new Criatura();
            $criatura->setIdCreature($idCreature);
            $criatura->setName($name);
            $criatura->setDescription($description);
            $criatura->setAvatar($avatar);
            $criatura->setAttackPower($attackPower);
            $criatura->setLifeLevel($lifeLevel);
            $criatura->setWeapon($weapon);
        }

        return $criatura;
    }

    public function insertCriatura($criatura) {
        $query = "INSERT INTO " . self::CRIATURA_TABLE . "( name, description, avatar, attackPower, lifeLevel, weapon) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conex, $query);
        $name = $criatura->getName();
        $description = $criatura->getDescription();
        $avatar = $criatura->getAvatar();
        $attack = $criatura->getAttackPower();
        $life = $criatura->getLifeLevel();
        $weapon = $criatura->getWeapon();

        mysqli_stmt_bind_param($stmt, 'ssssss', $name, $description, $avatar, $attack, $life, $weapon);
        return $stmt->execute();
    }

    public function updateCriatura($criatura) {
        $query = "UPDATE " . self::CRIATURA_TABLE . " SET name=?, description=?, avatar=?, attackPower=?, lifeLevel=?, weapon=? where idCreature=?";
        $stmt = mysqli_prepare($this->conex, $query);
        $name = $criatura->getName();
        $description = $criatura->getDescription();
        $avatar = $criatura->getAvatar();
        $attack = $criatura->getAttackPower();
        $life = $criatura->getLifeLevel();
        $weapon = $criatura->getWeapon();
        $id = $criatura->getIdCreature();
        mysqli_stmt_bind_param($stmt, 'ssssssi', $name, $description, $avatar, $attack, $life, $weapon, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . self::CRIATURA_TABLE . " WHERE idCreature =?";
        $stmt = mysqli_prepare($this->conex, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}

?>