<?php

session_start(); // démarrage de la session

// s'il y a le mot action dans l'URL 
if (isset($_GET['action'])) {

    // nous allons switcher entre différentes actions possible
    switch ($_GET['action']) {
        case "ajouter": // ajouter un produit
            if (isset($_POST['submit'])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if ($name && $price && $qtt) {

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];

                    $_SESSION['products'][] = $product;
                    header("Location:index.php");
                }
            }
            break; // fin de cette condition du switch

        case "viderPanier":
            unset($_SESSION["products"]);
            header("Location:index.php");
            die(); // fonction native obligeant l'arrêt de lecture du code
            break;

        case "supprimerProduit":
            //si j'ai le mot clé id dans l'URL et que j'ai un produit qui est dans mon tableau qui correspont
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                $produit = $_SESSION['products'][$_GET['id']]; // on cherche dans le tableau un produit précis
                unset($_SESSION['products'][$_GET['id']]);
                header("Location:recap.php");
                die();
            }
            break;

        case "decreaseQuantity":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                //je décrémente la valeur de "qtt" de 1
                $_SESSION['products'][$_GET['id']]['qtt'] -= 1;
                //je recalcule mon total pour pouvoir mettre à jour le prix par rapport a la quantité
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
                //je vérifie si la quantité est égale à 0, si oui, je supprime la ligne du tableau
                if ($_SESSION['products'][$_GET['id']]['qtt'] === 0) {
                    unset($_SESSION['products'][$_GET['id']]);
                }
                header('Location:recap.php');
                die();
            }
            break;

        case "increaseQuantity":
            if (isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
                $_SESSION['products'][$_GET['id']]['qtt'] += 1;
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['price'] * $_SESSION['products'][$_GET['id']]['qtt'];
                header('Location:recap.php');
                die();
            }
            break;
    }
}