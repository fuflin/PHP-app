<?php

require "db-function.php";


$id = $_GET["id"]; // on récupère les id depuis la session

$product = findOneById($id); // déclaration variable pour utilisé la fonction dans db-function
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Produit</title>
</head>

<body class="bg-dark text-light">
    <div class="container">

        <h2 class="text-center mt-5">Liste des Produits</h2>
        <div class="d-flex flex-column align-items-center">
            <h3 class="text-center mt-5"><?php echo $product['name']; ?></h3>
            <p class="text-justify w-50 mt-5 "><?php echo $product['description']; ?></p>
            <p class="text-center mt-5">Prix: <?php echo number_format($product['price'], 2); ?>€</p>
            <a href="traitement.php?action=ajoutPanier&id=<?= $product['id']; ?>" class="btn btn-primary w-25">Ajouter au panier</a>
            <a href="index.php" class="btn btn-secondary p-2 mt-3 w-50">Retour</a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


</html>