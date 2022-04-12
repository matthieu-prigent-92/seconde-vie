<?php

if (connect()) :
    header('location:../');
    exit();
endif;



if (!empty($_POST)) :

    $resultat = executeRequete("SELECT * FROM user WHERE email=:email", array(
        ':email' => $_POST['email']
    ));


    if ($resultat->rowCount() == 1) :

        $user = $resultat->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['password'], $user['password'])) :




            $_SESSION['user'] = $user;
            $_SESSION['messages']['success'][] = "Bienvenue " . $user['nickname'];


            header('location:../');
            exit();

        else :
            $_SESSION['messages']['danger'][] = "Erreur sur le mot de passe";

            header('location:./login.php');
            exit();

        endif;

    elseif ($resultat->rowCount() == 0) :

        $_SESSION['messages']['danger'][] = "Aucun compte n'est existant à cette adresse mail";

        header('location:./login.php');
        exit();


    elseif ($resultat->rowCount() > 1) :
        $_SESSION['messages']['danger'][] = "Une erreur est survenue, merci de contacter l'administrateur du site";

        header('location:./login.php');
        exit();

    endif;



endif;











?>



<form method="post" action="">

    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card-body p-5">
                    <!-- <h2 class="text-uppercase text-center mb-5">Connexion</h2> -->

                    <!-- input pour l'email -->
                    <label for="inputEmail">Email</label>
                    <div class="icone">
                        <input type="text" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" placeholder="Adresse email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div>
                        <span id="errorEmail"></span>
                    </div>

                    <!-- input pour le mot de passe -->
                    <label for="inputPassword" class="mt-3">Mot de passe</label>
                    <div class="icone">
                        <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" placeholder="Mot de passe (minimum 6 caractères)">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="far fa-eye" id="togglePassword"></i>
                    </div>
                    <div>
                        <span id="errorPassword"></span>
                    </div>


                    <div class="card-button">
                        <button class="btn my-3 btn-outline-danger btn-block rounded" type="submit">
                            Se connecter
                        </button>
                    </div>
                    <hr class="mb-3">
                    <h6 class="text-center mb-1">Vous n'avez pas de compte ? </br></br>
                        <a href="<?= SITE . "security/register.php"; ?>">Inscrivez-vous !</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

</form>
<?php
// Condition pour déterminer le lieu de redirection du fichier js
if ($_SERVER['PHP_SELF'] == SITE . 'index.php') {
    // si on se trouve à la racine
?>
    <script src="js/formLogin.js"></script>
<?php } ?>