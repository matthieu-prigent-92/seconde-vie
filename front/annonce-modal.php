<?php
require_once 'inc/header.php';


$resultatModal = executeRequete("SELECT * FROM product WHERE id = :id", array(
    'id' => $_GET['id']
));

// $productsModal = $resultatModal->fetchAll(PDO::FETCH_ASSOC);

?>
<div id="annonceModal" class="modal fade mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <!-- Insérer ici le href pour rediriger vers le modal -->
            <div class="card-header text-center">
                <img width="200" src="<?= $resultatModal['picture']; ?>" alt="">

            </div>
            <div class="card-body">
                <!-- Titre de l'annonce -->
                <h4 class="card-title"><?= $resultatModal['name']; ?></h4>

                <!-- Description de l'annonce -->
                <p class="card-text text-center"><?= $resultatModal['description']; ?></p>

                <!-- Prix de l'annonce -->
                <h4 class="card-title text-end"><?= $resultatModal['price']; ?> €</h4>
            </div>
        </div>
    </div>
</div>

<?php require_once 'inc/footer.php' ?>