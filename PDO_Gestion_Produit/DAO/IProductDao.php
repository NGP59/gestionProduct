<?php

interface IProductDao
{
    function getAllProduct():array;

    function saveProduct(string $name,string $numProduit,int $prix,string $desc);

    function updateProduct(string $name,string $numProduit,int $prix,string $desc, int $id);

    function deleteProduct(int $id):bool;

    function getProductnById(int $id):array;

    function getProductsByName(string $name):array;

    function getProductsByPrice(int $price):array;
}