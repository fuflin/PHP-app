<?php

session_start(); // démarrage de la session
require "db-function.php";


// s'il y a le mot action dans l'URL 
if (isset($_GET['action'])) {

    // nous allons switcher entre différentes actions possible
    switch ($_GET['action']) {
        case "ajoutbdd": // ajout produit dans la base de donnée
            if (isset($_POST['submit'])) { // ajout de filtre pour les champs
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);
                $descr = filter_input(INPUT_POST, "descr", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($name && $price && $descr) { // condition

                    $ajout = [
                        "name" => $name,
                        "price" => $price,
                        "descr" => $descr
                    ];

                    $id = insertProduct($ajout['name'], $ajout['descr'], $ajout['price']);
                    header("Location:product.php?id=" . $id);
                } else {
                    header("Location:recap.php");
                }
            }

            break;

        case "ajoutPanier": // fonction pour ajouter un produit
            if (isset($_GET['id'])) {

                $id = filter_var($_GET['id'], FILTER_VALIDATE_INT); //
                $item = findOneById($id);
                $qtt = 1;

                if ($id) {

                    $product = [
                        "name" => $item['name'],
                        "price" => $item['price'],
                        "qtt" => $qtt,
                        "total" => $item['price'] * $qtt
                    ];

                    $_SESSION['products'][] = $product;
                    header("Location:recap.php");
                }
            }
            break; // fin de cette condition du switch

        case "viderPanier": // fonction pour vider entièrement le panier
            unset($_SESSION["products"]);
            header("Location:index.php");
            die(); // fonction native obligeant l'arrêt de lecture du code
            break;

        case "supprimerProduit": // fonction pour supprimé un produit spécifique
            //si j'ai le mot clé id dans l'URL et que j'ai un produit qui est dans mon tableau qui correspont
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                $produit = $_SESSION['products'][$_GET['id']]; // on cherche dans le tableau un produit précis
                unset($_SESSION['products'][$_GET['id']]);
                header("Location:recap.php");
                die();
            }
            break;

        case "decreaseQuantity": // fonction pour diminuer la quantité d'un produit 
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                //je décrémente la valeur de "qtt" de 1
                $_SESSION['products'][$_GET['id']]['qtt'] -= 1;
                //recalcule du total pour pouvoir mettre à jour le prix par rapport a la quantité
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
                //je vérifie si la quantité est égale à 0, si oui, je supprime la ligne du tableau
                if ($_SESSION['products'][$_GET['id']]['qtt'] === 0) {
                    unset($_SESSION['products'][$_GET['id']]);
                }
                header('Location:recap.php');
                die();
            }
            break;

        case "increaseQuantity": // fonction pour augmenté la quantité d'un produit
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                // j'incrémente la 'qtt' de 1
                $_SESSION['products'][$_GET['id']]['qtt'] += 1;
                // recalcul du montant 
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
                header('Location:recap.php');
                die();
            }
            break;
    }
}
