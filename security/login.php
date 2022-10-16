<?php
require_once '../inc/header.php';

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
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Connexion</h2>

                            <label for="inputEmail">Email</label>
                            <input type="email" value="" name="email" id="inputEmail" class="form-control" autocomplete="email" required autofocus>
                            <label for="inputPassword" class="mt-3">Mot de passe</label>
                            <input type="password" name="password" id="inputPassword" class="form-control" autocomplete="current-password" required>


                            <div class="card-button">
                                <button class="btn my-3 btn-outline-danger btn-block rounded" type="submit">
                                    Se connecter
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <hr class="mb-3 w-75">
                        </div>
                        <h6 class="text-center mb-3">Vous n'avez pas de compte ? </br></br>
                            <a href="<?= SITE . "security/register.php"; ?>">Inscrivez-vous !</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>








<?php require_once '../inc/footer.php' ?>