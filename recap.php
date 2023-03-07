<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Récapitulatifs des produits</title>
</head>

<body class="bg-dark text-light">
    <!-- affichage du tableau des produits saisie -->
    <div class="container">
        <h1 class="text-center">Récapitulatifs des produits</h1>
        <?php
        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p>Aucun produit en session...</p>";
        } else {
            echo "<table class='table table-dark table-striped text-center'>",
            "<thead>",
            "<tr>",
            "<th>#</th>",
            "<th>Nom</th>",
            "<th>Prix</th>",
            "<th>Quantité</th>",
            "<th>Total</th>",
            "</tr>",
            "</thead>",
            "<tbody>";

            $totalGeneral = 0;

            foreach ($_SESSION['products'] as $index => $product) { //parcours le tableau de mes produits stockés en session
                echo "<tr>",
                "<td>" . $index . "</td>",
                "<td>" . $product['name'] . "</td>", // récupération du nom
                "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>", //récupération du prix
                "<td>" . '<a href="traitement.php?action=decreaseQuantity&id=' . $index . '" class="btn btn-outline-danger">-</a> ' . $product['qtt'] . ' <a href="traitement.php?action=increaseQuantity&id=' . $index . '" class="btn btn-outline-success">+</a>' . "</td>", //récupération de la quantité
                "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>", //Calcul du total
                "<td> <a href='traitement.php?action=supprimerProduit&id=$index' class='btn btn-danger'>retirer produit</a></td>",
                "</tr>"; // bouton pour retirer un produit du panier
                $totalGeneral += $product['total'];
            }
            echo "<tr>", // affichage du total des produits
            "<td colspan=4>Total général : </td>",
            "<td><srtong>" . number_format($totalGeneral, 2, ",", "&nbsp;") . "&nbsp;€</strong></td>",
            "</tbody>",
            "</table>";
        }

        ?>
        <!-- bouton pour vider enitèrement le panier -->
        <div class="col">
            <a href="traitement.php?action=viderPanier" class="btn btn-secondary d-block p-2 mt-3">vider panier</a>
        </div>
        <!-- bouton annexe -->
        <div class="col">
            <a href="admin.php" class="btn btn-secondary d-block p-2 mt-3">Acceuil</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>