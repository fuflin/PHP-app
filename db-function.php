<?php

$dB = "mysql:host=localhost;dbname=store";
$user = "";
$pass = "yes";

try {
    $pdo = new PDO($dB, $user, $pass);

    echo "Connexion établie";
} catch (PDOException $pe) {
    echo "Erreur : " . $pe->getMessage();
}
