<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Ajout produit</title>
</head>

<!-- Titre de l'appli -->

<body class="bg-dark text-light">

    <div class="container mt-5">
        <div class="d-flex">
            <a href="recap.php" class="btn btn-secondary d-block">Recap</a>
            <a href="index.php" class="btn btn-secondary d-block ms-3">Index BD</a>
        </div>
        <h2 class="text-center mb-5">Ajouter un produit</h2>
        <form action="traitement.php?action=ajoutbdd" method="post">
            <div class="row">
                <!-- champ pour le nom du produit -->
                <div class="col">
                    <label for="name" class="form-label">Nom du produit :</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <!-- champ pour le prix du produit -->
                <div class="col">
                    <label for="price" class="form-label">Prix du produit :</label>
                    <input type="text" class="form-control" name="price">
                </div>
            </div>
            <!-- champ pour la quantité du produit -->
            <div class="d-flex flex-column align-items-center mt-5">
                <label for="descr" class="form-label">Description :</label>
                <textarea name="descr" class="w-50 "></textarea>
            </div>
            <!-- bouton pour ajouter le produit saisie -->
            <div class="d-flex justify-content-center mt-5">
                <input type="submit" class="btn btn-secondary w-50" name="submit" value="Ajouter le produit">
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>