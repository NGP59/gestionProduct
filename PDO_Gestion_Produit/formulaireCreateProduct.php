<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>

<body>
    <fieldset>
        <form action="" method="post">
            <label for="name">Nom produit</label>
            <input type="text" name="name"><br>
            <label for="numeroProduit">Numero Produit</label>
            <input type="text" name="numeroProduit"><br>
            <label for="prix">Prix</label>
            <input type="number" name="prix"><br>
            <label for="description">description Produit</label>
            <input type="text" name="description"><br>

            <input type="submit" value="Enregistrement">
        </form>
    </fieldset>



    <?php
    require_once('./utils/DBconnect.php');
    require_once('./DAO/IProductDao.php');
    require_once('./DAO/imp/ProductDaoimp.php');
    require_once('./Model/Product.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Vérification si les champs requis sont présents dans la requête
        if (isset($_POST['name']) && isset($_POST['numeroProduit']) && isset($_POST['description']) && isset($_POST['prix'])) {

            $name = $_POST['name'];
            $numProduit = $_POST['numeroProduit'];
            $prix = $_POST['prix'];
            $description = $_POST['description'];

            $newProduct = new ProductDaoImp();
            $newProduct->saveProduct($name, $numProduit, $prix, $description);
        }
    }
    ?>
</body>

</html>