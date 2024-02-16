<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>

<body>
    <form action="" method="get">
        <label for="name">Recherche Part Nom : </label>
        <input type="text" name="nameToId">
        <input type="submit" name="submitName" value="Recherche">
        <br><br>
        <label for="price">Recherche Part Prix : </label>
        <input type="number" name="priceToId">
        <input type="submit" name="submitPrice" value="Recherche">
    </form>

    <br>
    <?php
    require_once('./utils/DBconnect.php');
    require_once('./DAO/IProductDao.php');
    require_once('./DAO/imp/ProductDaoimp.php');
    require_once('./Model/Product.php');



    $productDao = new ProductDaoImp();
    if (isset($_GET['submitName'])) 
    {
        $products = $productDao->getProductsByName($_GET['nameToId']);
    } 
    else if (isset($_GET['submitPrice'])) 
    {
        $products = $productDao->getProductsByPrice($_GET['priceToId']);
    } 
    else{
        $products = $productDao->getAllProduct();
    }

    foreach ($products as $product) {
        echo $product . "<br>";
    ?>
        <a href="deleteProduct.php?id=<?= $product->getId() ?> ">
            <button>Supprimer</button>
        </a>
        <a href="updateProduct.php?id=<?= $product->getId() ?>">
            <button>Editer</button>
        </a>
        <br>
    <?php


    }
    ?>

</body>

</html>