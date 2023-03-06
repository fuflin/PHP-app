<?php

require "db-function.php";
require "traitement.php";

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
    <h1 class="text-center">Produits enregistrés</h1>

    <div class="container mt-5">
        <?php
        echo "<table class='table table-dark table-striped text-center'>";
        echo "<tr><th>Name</th><th>Description</th><th>Price</th><th>Action</th></tr>";
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td><a href='product.php?id=" . $product['id'] . "'>" . $product['name'] . "</a></td>";
            echo "<td>" . substr($product['description'], 0, 50) . "...</td>";
            echo "<td>" . $product['price'] . " EUR</td>";
            echo "<td><a href='recap.php?id=" . $product['id'] . "'>Ajouter Produit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <div class="col">
            <a href="admin.php" class="btn btn-secondary d-block p-2 mt-3">Acceuil</a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>