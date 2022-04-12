<?php 

// Création d'un objet Connexion permettant d'accéder au serveur distant du site internet
$connexion = new Connexion;

$connexion->setPdo_host('localhost');
$connexion->setPdo_dbname('entreprise');
$connexion->setPdo_user('root');
$connexion->setPdo_pwd('');

 ?>