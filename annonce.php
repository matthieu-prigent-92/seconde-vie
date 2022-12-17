<?php
require_once 'inc/header.php';

if (isset($_GET['unset'])) :
    unset($_SESSION['user']);
    header('location:./');
    exit();
endif;


if (isset($_GET['id'])){
    $resultatAnnonce = executeRequete("SELECT * FROM product WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    $annonce = $resultatAnnonce->fetch(PDO::FETCH_ASSOC);
}
//debug($annonce);
//debug($phpself=explode('/', $_SERVER['PHP_SELF']));

?>
    <!-- Titre de l'annonce -->
    <h4 class="card-title text-center"><?= $annonce['name']; ?></h4>
<div id="annonce" class="border-secondary mb-3 mx-5 mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6 card-header text-center">
                <img width="400" src="<?= $annonce['picture']; ?>" alt="">

            </div>
            <div class="col-md-6 card-body">

                <!-- Description de l'annonce -->
                <h4 class="card-text text-start"><?= $annonce['description']; ?></h4>

                <!-- Prix de l'annonce -->
                <h4 class="card-title text-start"><?= $annonce['price']; ?> €</h4>

            </div>
        </div>
    </div>
</div>
<a href="index.php" class="text-decoration-none d-flex justify-content-center">
        <button type="button" class="btn btn-danger button-annonce">
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-danger button-annonce" data-bs-toggle="modal" data-bs-target="#annonceModal"> -->
            Retour
        </button>
    </a>

<?php require_once 'inc/footer.php' ?>