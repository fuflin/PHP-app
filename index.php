<?php

require "db-function.php";


$products = findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Acceuil BD</title>
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <!-- bouton retour à la page admin et recap -->
        <div class="d-flex">
            <a href="admin.php" class="btn btn-secondary d-block">Admin</a>
            <a href="recap.php" class="btn btn-secondary d-block ms-3">Recap</a>
        </div>
        <h2 class="text-center mt-5">Produits enregistrés</h2>
        <!-- tableau des produits de la base de donnée -->
        <?php
        echo "<table class='table table-dark table-striped text-center mt-5'>";
        echo "<tr><th>Name</th><th>Description</th><th>Price</th><th></th></tr>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td><a class='btn btn-info' href='product.php?id=" . $product['id'] . "'>" . $product['name'] . "</a></td>";
            echo "<td>" . substr($product['description'], 0, 50) . "...</td>";
            echo "<td>" . $product['price'] . " EUR</td>";
            echo "<td><a class='btn btn-warning' href='traitement.php?action=ajoutPanier&id=" . $product['id'] . "'>Ajouter Produit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>