<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    require_once('./utils/DBconnect.php');
    require_once('./DAO/IProductDao.php');
    require_once('./DAO/imp/ProductDaoimp.php');
    require_once('./Model/Product.php');

    $product_id = $_GET['id'];

    $productSelected = new ProductDaoImp();
    $result = $productSelected->getProductnById($product_id);

    $product = new Product($result['id'], $result['nom'], $result['numeroProduit'], $result['prix'], $result['description'],);

    ?>

    <form action="" method="post">

    <label for="nom"> Nom : </label>
        <input type="text" name="nom" value="<?= $product->getName() ?>"> <br>

        <label for="numeroProduct"> Numero Produt : </label>
        <input type="text" name="numeroProduct" value="<?= $product->getNumProduct() ?>"> <br>

        <label for="prix"> Prix : </label>
        <input type="number" name="prix" value="<?= $product->getPrice() ?>"> <br>

        <label for="description"> Description Produt : </label>
        <input type="text" name="description" value="<?= $product->getDescription() ?>"> <br>

        <input type="submit" name="submit" value="Valider les modifications">
    </form>


    <?php
    // Vérification si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupération des nouvelles valeurs depuis le formulaire
        $name = $_POST['nom'];
        $numProduit = $_POST['numeroProduct'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];

        // Appel de la méthode updatePerson de la DAO pour mettre à jour les informations de la personne dans la base de données
      $productEdit = new ProductDaoImp();
      $productEdit->updateProduct($name, $numProduit, $prix, $description,$product_id);
        
        // Redirection vers la page de sélection après la mise à jour
        header("Location: allProduct.php");
    }
    ?>
</body>

</html>