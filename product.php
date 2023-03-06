<?php

require "db-function.php";
// require "index.php";

$products = findOneById($id);

foreach ($products as $product) {
    echo $product["name"]["descr"]["price"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>

<body>
    <h1 class="text-center">Liste des Produits</h1>

</body>
<div class="col">
    <a href="admin.php" class="btn btn-secondary d-block p-2 mt-3">Retour</a>
</div>

</html>