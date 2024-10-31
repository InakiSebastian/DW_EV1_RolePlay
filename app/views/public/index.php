<?php
require_once dirname(__FILE__) . '\..\templates\header.php';
require_once (dirname(__FILE__) . '\..\..\controllers\CriaturaController.php');
$criaturaController = new CriaturaController();
$listaCriaturas = $criaturaController->obtenerListaCriaturas();
?>

<body>

    <h1 class="text-center">Comunidad de RolePlay</h1>
    <hr>
    <h2 class="text-center">Abajo se encuentran las criaturas</h2>


    <div class="container-fluid">
        <div class="row">
                <?php
                foreach ($listaCriaturas as $criatura) {
                    echo '<div class="card ms-3" style="width: 18rem;">';
                    echo '<img src="' . $criatura->getAvatar() . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $criatura->getName() . '</h5>';
                    echo '<p class="card-text">' . $criatura->getDescription() . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>