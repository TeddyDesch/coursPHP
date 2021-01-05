<?php

//Ce fichier contient toutes les fonction nécessaires pour le sites. Il doit être inclus sur toutes les pages du site.

//pour que toutes les pages puissent travailler avec les variables en session
session_start();

//fonction permettant de verifier le recapcha google:
function recaptchaValid($code, $ip = null)
{
    if(empty($code)) {
        return false;
    }
    $params = [
        'secret'    => '6LftLSAaAAAAAEVfr304G-W6wDZ8rH31_8ZkCpm6',
        'response'  => $code
    ];
    if($ip){
        $params['remoteip'] = $ip;
    }
    $url = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query($params);
    if(function_exists('curl_version')){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
    }else{
        $response = file_get_contents($url);
    }
    if(empty($response) || is_null($response)){
        return false;
    }
    $json = json_decode($response);
    return $json->success;
}


//fonction permettant de retourner une connexion à la bdd
function connectDB(){
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=php_final_project;charset=utf8', 'root', '');

        // TODO: Penser à enlever la ligne qui suit qunad le site est fini
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die ('Problème avec la base de données : ' . $e->getMessage());
    }
    return $bdd;
}

//fonction permettant de savoir si l'user zst connecté(retournera true)
function isConnected(){
    return isset($_SESSION['user']);
}

//fonction permettant de bloquer une page si l'user est déja connecté
function mustBeNotConnected(){

    if(isConnected()){
        header('HTTP/1.0 403 Forbidden');
        require 'core/layouts/alreadyConnected.php';
        die(); //Empèche le reste de la page initiale de charger
    }
}

//Fonction permettant de bloquer une page si l'user n'est pas connecté
function mustBeConnected(){

    //Si $SESSION[user] n'existe pas, alors l'user pas  connecté
    if(!isConnected()){
        header('HTTP/1.0 403 Forbidden');
        require 'core/layouts/notConnected.php';
        die(); //Empèche le reste de la page initiale de charger
    }
}


//Fonction qui permet d'afficher la classe CSS active sur un line du menu uniaquement si pagetotest contient le nom de la page actuelle
function setActiveIfPageIs($pageToTest){

    //on récupere le nom de la page actuelle via la fonction basename
    $currentPage = basename($_SERVER['PHP_SELF']);

    if($currentPage == $pageToTest){
        echo ' active';
    }
}


//Liste des pays autorisés pour les fruits 
$fruitCountries =[
    'fr' => 'france',
    'de' => 'allemagne',
];