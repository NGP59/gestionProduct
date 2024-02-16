<?php

class Product
{
    private string $name;
    private string $numProduct;
    private int $price;
    private string $description;

    private int $id;
    public function __construct(int $id, string $name, string $numProduct, int $price, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->numProduct = $numProduct;
        $this->price = $price;
        $this->description = $description;
        $this->id = $id;
    }

    public function __toString(): string
    {
        return "<br> Nom : " . $this->getName() . 
        "<br> Numéro Produit : " . $this->getNumProduct() . 
        "<br> Prix :" . $this->getPrice() . 
        "<br> Description : " . $this->getDescription() . 
        "<br> ID : " . $this->getId();
    }
    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of numProduct
     *
     * @return string
     */
    public function getNumProduct(): string
    {
        return $this->numProduct;
    }

    /**
     * Set the value of numProduct
     *
     * @param string $numProduct
     *
     * @return self
     */
    public function setNumProduct(string $numProduct): self
    {
        $this->numProduct = $numProduct;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param int $price
     *
     * @return self
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
