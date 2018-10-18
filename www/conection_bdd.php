<?php
    try
    {
    $bdd = new PDO('mysql:host=148.60.210.81;dbname=projet;charset=utf8', 'test', 'coucou',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));                                    //lien avec la base de données
    }
    catch (Exception $e)                                                                    //en cas d'erreur on arrête la page
    {
            die('Erreur : ' . $e->getMessage());
    }
   ?>