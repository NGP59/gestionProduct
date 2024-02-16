<?php

require_once('./utils/DBconnect.php');
require_once('./DAO/IProductDao.php');
require_once('./DAO/imp/ProductDaoimp.php');
require_once('./Model/Product.php');

if (isset($_GET['id'])) {
  
    //ON fait appel a la DAO 
    // AVEC LA METHODE DELETE
    $productToDelete = new ProductDaoImp();
    $productToDelete->deleteProduct($_GET['id']);
    // ON FAIT UNE REDIRECTION 
    // VERS LA PAGE SELECTIONPDO
    header('Location: allProduct.php');
}
