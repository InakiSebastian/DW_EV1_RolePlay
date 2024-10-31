<?php
require_once dirname(__FILE__) . '\..\templates\header.php';
require_once (dirname(__FILE__) . '\..\..\controllers\CriaturaController.php');
require_once (dirname(__FILE__) . '\..\..\models\Criatura.php');
$criaturaController = new CriaturaController();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
}

$criatura = $criaturaController->obtenerPorId($id);
$valueName = $criatura->getName();
$valueDescription = $criatura->getDescription();
$valueAvatar = $criatura->getAvatar();
$valueAttack = $criatura->getAttackPower();
$valueLife = $criatura->getLifeLevel();
$valueWeapon = $criatura->getWeapon();
?>

<body class="text-center">
    <h1>DETALLE DE LA CRIATURA<h1>
            <img class="img-fluid" style="height: 400px;width:400px;" src="<?php echo $valueAvatar ?>" alt="imagenCriatura"/>
            <h3>NAME: <?php echo $valueName ?></h3>
            <h3>DESCRIPTION: <?php echo $valueDescription ?></h3>           
            <h3>ATTACK:<?php echo $valueAttack ?> </h3>
            <h3>LIFE: <?php echo $valueLife ?></h3>
            <h3>WEAPON: <?php echo $valueWeapon ?></h3>
            <a type="button" class="btn btn-danger  mb-1" href="./index.php">VOLVER</a>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            </body>