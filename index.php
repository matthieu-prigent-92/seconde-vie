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






$resultat = executeRequete("SELECT * FROM product");

$products = $resultat->fetchAll(PDO::FETCH_ASSOC);  // fetchAll() à utiliser systématiquement lorsque l'on a un jeu de résultat supérieur à un
// renvoie un tableau

//debug($products);
//die();
if (isset($_GET['id'])) :

    executeRequete("DELETE FROM product WHERE id=:id", array(
        ':id' => $_GET['id']
    ));

    $_SESSION['messages']['success'][] = 'Votre produit a bien été supprimé';


    header('location:./');
    exit();
endif;

//$_SESSION['messages']['success'][]='Votre produit a bien été supprimé';
//debug($_SESSION);
//die();

?>


<div class="row justify-content-between">
    <?php foreach ($products as $product) :

        $quant = 0;
        foreach ($_SESSION['cart'] as $id => $quantity) :
            if ($product['id'] == $id) :
                $quant = $quantity;
            endif;
        endforeach;

    ?>
        <div class="card border-secondary mb-3 col-md-4" style="max-width: 20rem;">
            <div class="card-header text-center">
                <img width="200" src="<?= $product['picture']; ?>" alt="">

            </div>

            <label id="<?= $product['id']; ?>">
            <div class="card-body">


                <!-- Titre de l'annonce -->
                <a href="<?= SITE . "front/annonce-modal.php?id=" . $product['id'] ?>" class="text-decoration-none">
                    <h4 class="card-title"><?= $product['name']; ?></h4>
                </a>

                <!-- Description de l'annonce -->
                <p class="card-text text-center"><?= $product['description']; ?></p>

                <!-- Prix de l'annonce -->
                <h4 class="card-title text-end"><?= $product['price']; ?> €</h4>

                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger button-annonce" data-bs-toggle="modal" data-bs-target="#annonceModal">
                        Voir l'annonce
                    </button>
                        <!-- Pour afficher le modal -->
                        <!-- Problème pour atteindre les autres éléments de la database -->
                        <div class="modal fade popup_block" id="annonceModal" tabindex="0" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $resultatModal['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

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

    <?php endforeach; ?>
</div>

<!-- Pour charger des informations en get  on déclare avec ? le chargement de $_GET suivie de l'indice (le name à appelé sur $_GET) et on lui affecte sa valeur avec =savaleur. ex: ?prenom='cesaire'&nom='desaulle'; le debug de $_GET nous renvoie 'nom'=>'desaulle',-->
<!--   'prenom'=>'cesaire'. Pour y accéder on appelle $_GET['nom'] nous retourne 'desaulle'-->


<?php require_once 'inc/footer.php' ?>