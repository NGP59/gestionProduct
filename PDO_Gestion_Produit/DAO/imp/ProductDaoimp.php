<?php

class ProductDaoImp implements IProductDao
{
    private PDO $connexion;

    public function __construct()
    {
        $this->connexion = DBconnect::getInstance("mysql:host=localhost;dbname=gestion_produit", "root", "")->getConnexion();
    }


    public  function getAllProduct(): array
    {
        $products = [];

        try {
            $statement =   $this->connexion->prepare("SELECT * FROM produit ;");

            $statement->execute();
            // Récupération des résultats sous forme de tableau associatif
            $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);

            // Si des résultats sont trouvés
            if (count($resultat) > 0) {
                // Parcours des résultats pour créer des objets Person
                foreach ($resultat as $row) {
                    // Création d'un nouvel objet Person avec les données récupérées
                    $products[] = new Product($row['id'], $row['nom'], $row['numeroProduit'], $row['prix'], $row['description']);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $products;
    }


    public function saveProduct(string $name, string $numProduit, int $prix, string $desc)
    {
        try {

            // Définition de la requête SQL pour insérer une nouvelle personne dans la table 'persons'
            $query = "INSERT INTO produit (nom , numeroProduit , prix , description) VALUES (:nom , :numeroProduit , :prix , :description)";

            // Préparation de la requête SQL
            $stmt =   $this->connexion->prepare($query);

            // Liaison des valeurs des champs du formulaire avec les paramètres de la requête SQL
            $stmt->bindValue(':nom', $name);
            $stmt->bindValue(':numeroProduit', $numProduit);
            $stmt->bindValue(':prix', $prix);
            $stmt->bindValue(':description', $desc);

            // Exécution de la requête SQL préparée
            $stmt->execute();

            // Affichage d'un message de réussite si l'insertion s'est déroulée avec succès
            echo "Enregistrement réussi !";
        } catch (PDOException $e) {
            // Affichage d'un message d'erreur en cas d'échec de l'insertion
            echo "Un problème est survenu";
        }
    }

    function updateProduct(string $name, string $numProduit, int $prix, string $desc, int $id)
    {
        try {

            // Requête SQL pour mettre à jour les informations d'une personne avec un ID donné
            $query  = "UPDATE produit SET nom = :name , numeroProduit = :numeroProduit , prix = :prix , description = :description WHERE id = :id ;";

            // Préparation de la requête SQL
            $stmt = $this->connexion->prepare($query);

            // Liaison des valeurs des paramètres de la requête SQL préparée
            $stmt->bindValue(":id", $id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':numeroProduit', $numProduit);
            $stmt->bindValue(':prix', $prix);
            $stmt->bindValue(':description', $desc);

            // Exécution de la requête SQL préparée
            $stmt->execute();
        } catch (PDOException $PDOException) {
            // Gestion des exceptions PDO : affichage du message d'erreur
            echo $PDOException->getMessage();
        }
    }

    function deleteProduct(int $id): bool
    {
        try {


            $query = "DELETE FROM produit WHERE id = :id";

            $stmt = $this->connexion->prepare($query);

            $stmt->bindValue(":id", $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }

    function getProductnById(int $id): array
    {
        $result = [];


        try {
            // Préparation de la requête SQL pour récupérer une personne par son ID
            $query = "SELECT * FROM produit WHERE id = :id";

            // Préparation de la requête SQL
            $stmt = $this->connexion->prepare($query);

            // Liaison de la valeur de $id avec le paramètre :id de la requête SQL préparée
            $stmt->bindValue(':id', $id);

            // Exécution de la requête SQL préparée
            $stmt->execute();

            // Récupération du résultat de la requête sous forme de tableau associatif
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gestion des exceptions PDO : affichage du message d'erreur
            echo $e->getMessage();
        }

        // Retourne le résultat (peut être un tableau associatif contenant les données de la personne ou null si aucune personne correspondante n'a été trouvée)
        return $result;
    }

    function getProductsByName(string $name): array
    {
        $products = [];


        try {
            // Préparation de la requête SQL pour récupérer une personne par son ID
            $query = "SELECT * FROM produit WHERE nom LIKE :name";

            // Préparation de la requête SQL
            $stmt = $this->connexion->prepare($query);

            // Liaison de la valeur de $id avec le paramètre :id de la requête SQL préparée
            $stmt->bindValue(':name', '%' . $name . '%');
            // Exécution de la requête SQL préparée
            $stmt->execute();

            // Récupération du résultat de la requête sous forme de tableau associatif
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si des résultats sont trouvés
            // print_r($result);
            if (count($result) > 0) {
                $products[] = new Product($result['id'], $result['nom'], $result['numeroProduit'], $result['prix'], $result['description']);
            }
        } catch (PDOException $e) {
            // Gestion des exceptions PDO : affichage du message d'erreur
            echo "Nom du produit introuvable";
        }

        // Retourne le résultat (peut être un tableau associatif contenant les données de la personne ou null si aucune personne correspondante n'a été trouvée)
        return $products;
    }

    function getProductsByPrice(int $price): array
    {
        $products = [];


        try {
            // Préparation de la requête SQL pour récupérer une personne par son ID
            $query = "SELECT * FROM produit WHERE prix = :prix";

            // Préparation de la requête SQL
            $stmt = $this->connexion->prepare($query);

            // Liaison de la valeur de $id avec le paramètre :id de la requête SQL préparée
            $stmt->bindValue(':prix', $price);
            // Exécution de la requête SQL préparée
            $stmt->execute();

            // Récupération du résultat de la requête sous forme de tableau associatif
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si des résultats sont trouvés
            // print_r($result);
            if (count($result) > 0) {
                $products[] = new Product($result['id'], $result['nom'], $result['numeroProduit'], $result['prix'], $result['description']);
            }
        } catch (PDOException $e) {
            // Gestion des exceptions PDO : affichage du message d'erreur
            echo "Nom du produit introuvable liée au prix";
        }

        // Retourne le résultat (peut être un tableau associatif contenant les données de la personne ou null si aucune personne correspondante n'a été trouvée)
        return $products;
    }
}
