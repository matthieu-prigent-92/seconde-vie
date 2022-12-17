<?php
require_once 'inc/header.php';

if (isset($_GET['unset'])) :
    unset($_SESSION['user']);
    header('location:./');
    exit();
endif;

if (isset($_GET['add'])) :
    add($_GET['add']);
    header('location:./');
    exit();
endif;

if (isset($_GET['remove'])) :
    remove($_GET['remove']);
    header('location:./');
    exit();
endif;

if (isset($_GET['id'])){
    $resultatAnnonce = executeRequete("SELECT * FROM product WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    $annonce = $resultatAnnonce->fetch(PDO::FETCH_ASSOC);
}

?>


        <div class="card border-secondary mb-3 col-md-4" style="max-width: 20rem;">
            <div class="card-header text-center">
            <img width="200" src="<?= $annonce['picture']; ?>" alt="">

            </div>

            <label id="test">
                <div class="card-body">


                    <!-- Titre de l'annonce -->
                    <h4 class="card-title"><?= $annonce['name']; ?></h4>
                    

                    <!-- Description de l'annonce -->
                    <p class="card-text text-center"><?= $annonce['description']; ?></p>

                    <!-- Prix de l'annonce -->
                    <h4 class="card-title text-end"><?= $annonce['price']; ?> €</h4>

                    <a href="index.php" class="text-decoration-none">
                        <button type="button" class="btn btn-danger button-annonce">
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-danger button-annonce" data-bs-toggle="modal" data-bs-target="#annonceModal"> -->
                            Retour
                        </button>
                    </a>

                </div>
            </label>

            <!-- Boutons réservés aux modifications admin -->
            <?php if (admin()) : ?>
                <a href="<?= SITE . 'admin/ajoutAnnonce.php?id=' . $product['id']; ?>" class="btn btn-secondary">Modifier</a>
                <a href="?id=<?= $product['id']; ?>" onclick="return confirm('Etes  vous sûr?')" class="btn btn-danger">Supprimer</a>
            <?php else : ?>

                <!-- <div class="text-center mb-3">
                        <a href="?remove=<?= $product['id']; ?>" class="btn btn-primary">-</a>
                        <input class="text-center ps-3 pe-0" disabled style="width: 15%" type="number" value="<?= $quant; ?>">
                        <a href="?add=<?= $product['id']; ?>" class="btn btn-primary">+</a>
                    </div> -->
            <?php endif; ?>
        </div>

</div>

<!-- Pour charger des informations en get  on déclare avec ? le chargement de $_GET suivie de l'indice (le name à appelé sur $_GET) et on lui affecte sa valeur avec =savaleur. ex: ?prenom='cesaire'&nom='desaulle'; le debug de $_GET nous renvoie 'nom'=>'desaulle',-->
<!--   'prenom'=>'cesaire'. Pour y accéder on appelle $_GET['nom'] nous retourne 'desaulle'-->


<?php require_once 'inc/footer.php' ?>