create table produit(
    id int PRIMARY KEY AUTO_INCREMENT not null,
nom varchar(50) NOT null DEFAULT 'produit inconnu',
    numeroProduit varchar(50) not null,
    prix int not null ,
    description varchar(255) DEFAULT 'Aucune description'
);