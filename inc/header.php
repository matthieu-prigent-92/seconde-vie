<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seconde Vie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/lux/bootstrap.min.css" integrity="sha512-B5sIrmt97CGoPUHgazLWO0fKVVbtXgGIOayWsbp9Z5aq4DJVATpOftE/sTTL27cu+QOqpI/jpt6tldZ4SwFDZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <?php
    // Condition pour déterminer le lieu de redirection du fichier css

    // Décomposition du PHP_SELF
    $phpself = explode('/', $_SERVER['PHP_SELF']);
    if (array_pop($phpself) == 'index.php') {
        // si on se trouve à la racine
    ?>

        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/formulaire.css">

    <?php
    } else {
        // Si on se trouve dans un sous-dossier de la racine du site
    ?>

        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/formulaire.css">

    <?php
    }
    ?>
</head>

<body>

    <?php require_once 'init.php';

    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand logo-titre" href="<?= SITE; ?>">SECONDE VIE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" href="#">Accueil</a> -->
                    </li>
                    <?php if (admin()) :

                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= SITE . 'admin/ajoutProduit.php'; ?>">Ajout produit</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link rounded btn btn-outline-danger" href="#">Déposer une annonce</a>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active" href="<?= SITE . 'front/fullCart.php'; ?>">
                            <button type="button" class="rounded btn btn-outline-warning position-relative p-2 ">
                                <i class="fa-solid fa-cart-arrow-down fa-2xl "></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                                    <?= getQuantity(); ?>+

                                </span>
                            </button>
                        </a>
                    </li> -->
                </ul>
                <form class="d-flex search-container">
                    <input class="form-control me-sm-2" type="text" placeholder="Rechercher">
                    <button class="my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <?php if (!connect()) :
                ?>
                    <div class="nav-connexion text-center ">
                        <a href="#" class="nav-link btn btn-danger rounded" data-bs-toggle="modal" data-bs-target="#connexionModal">Se connecter</a>
                        <!-- <a href="<?= SITE . 'security/register.php'; ?>" class="btn btn-primary ">S'inscrire</a> -->
                    </div>
                <?php else : ?>
                    <div class="text-center ">
                        <a href="<?= SITE . '?unset=1'; ?>" class="btn mt-1"><i class="fa-solid fa-power-off"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) :
            foreach ($_SESSION['messages'] as $type => $mess) :
                foreach ($mess as $key => $message) :
        ?>

                    <div class="alert alert-<?= $type; ?> text-center">
                        <p><?= $message; ?></p>
                    </div>
                    <?php unset($_SESSION['messages'][$type][$key]); ?>
        <?php endforeach;
            endforeach;
        endif; ?>


        <!-- Modal connexion -->
        <div class="modal fade" id="connexionModal" tabindex="-1" aria-labelledby="connexionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="connexionModalLabel">Connexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        // Condition pour déterminer le lieu de redirection du fichier login
                        if ($_SERVER['PHP_SELF'] == SITE . 'index.php') {
                            // si on se trouve à la racine
                            include 'security/login-modal.php';
                        } else {
                            // Si on se trouve dans un sous-dossier de la racine du site
                            include '../security/login-modal.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>