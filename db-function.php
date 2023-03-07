<?php

function connexion() // fonction créer pour se connecter à la base de donnée 
{

    $data = "mysql:host=localhost;dbname=store";
    $user = "root";
    $pass = "";

    $pdo = new PDO($data, $user, $pass, array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // option précisant le type d'erreur en cas de requête invalide
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, // option définissant le mode de récupération de la BD, ici les données seront sous forme de tableau associatif (FETCH_ASSOC)
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" // option insérant une commande MySQL à l'instanciation de l'objet PDO, dans ce cas on force la prise en charge de l'utf-8 
    ));

    return $pdo;
}

function findAll() // fonction pour affiché tous les éléments de la base de donnée
{
    $dB = connexion();
    // déclaration variable pour appelé la fonction de manière ponctuelle
    $state = $dB->query("SELECT id, name, description, price FROM product");
    // variable requête SQL, query = prépare et exécute la requête
    return $state->fetchAll(); // récupère un tableau de produit
}

function findOneById($id) // fonction pour affiché un produit par rapport à l'id
{
    $dB = connexion();
    $state = $dB->prepare("SELECT id, name, description, price FROM product WHERE id = :id");
    // prepare = préparation de la requête qu'on stocke pour l'utilisé plus tard
    $state->execute(["id" => $id]); // on définit l'id par rapport à la variable $id
    // execute = execution de la requête stocké
    return $state->fetch(); // récupère un élément
}

function insertProduct($name, $descr, $price) //fonction pour insérer des produits dans la BD avec nom, description et prix
{
    $dB = connexion();
    $stmt = $dB->prepare("INSERT INTO product (name, description, price) VALUES (:name, :descr, :price)");
    // requête stocké avec les éléments à insérer
    $stmt->execute([
        "name" => $name,
        "descr" => $descr,
        "price" => $price
    ]);
    // execution des éléments à inséré avec leurs variables correspondantes
    return $stmt;
}
