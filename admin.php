<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Ajout produit</title>
</head>

<!-- Titre du site -->

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center">Ajouter un produit</h2><br><br><br>

        <form action="traitement.php?action=ajouter" method="post">
            <div class="row">
                <!-- champ pour le nom du produit -->
                <div class="col">
                    <label for="name" class="form-label">Nom du produit :</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <!-- champ pour le prix du produit -->
                <div class="col">
                    <label for="price" class="form-label">Prix du produit :</label>
                    <input type="text" class="form-control" step="any" name="price">
                </div>
                <!-- champ pour la quantité du produit -->
                <div class="col">
                    <label for="qtt" class="form-label">Quantité desirée :</label>
                    <input type="number" class="form-control" name="qtt" value="1">
                </div>
            </div>
            <!-- bouton pour ajouter le produit saisie -->
            <div class="d-grid gap-2 mt-3">
                <input type="submit" class="btn btn-secondary" name="submit" value="Ajouter le produit">
            </div>
        </form>
        <!-- bouton annexe -->
        <a href="recap.php" class="btn btn-secondary d-block p-2 mt-3">Panier</a>
        <a href="index.php" class="btn btn-secondary d-block p-2 mt-3">Index BD</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>