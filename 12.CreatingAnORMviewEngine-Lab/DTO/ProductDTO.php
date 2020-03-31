<?php

namespace DTO;

class ProductDTO
{
    /**
     * @var int
     */
    private $product_id;

    /**
     * @var string
     */
    private $product_name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \datetime
     */
    private $create_date;

    /**
     * @var int
     */
    private $cat_id;

    /**
     * @return int
     */
    public function getCatId(): ?int
    {
        return $this->cat_id;
    }

    /**
     * @param int $cat_id
     */
    public function setCatId(int $cat_id): void
    {
        $this->cat_id = $cat_id;
    }
    /**
     * @var string
     */
    private $cat_name;

    /**
     * @var array
     */
    private $cat_list = [];

    /**
     * @return \Generator|CategoryDTO[]
     */
    public function getCatList(): \Generator
    {
        return $this->cat_list;
    }

    /**
     * @param array $cat_list
     */
    public function setCatList($cat_list): void
    {
        $this->cat_list = $cat_list;
    }

    /**
     * @return int
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return string
     */
    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    /**
     * @param string $product_name
     */
    public function setProductName(string $product_name): void
    {
        $this->product_name = $product_name;
    }

    /**
     * @return float
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getDescriptionOrNA(): ?string
    {
        return $this->description?:'n/a';
    }
    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \datetime
     */
    public function getCreateDate(): \datetime
    {
        return $this->create_date;
    }

    public function getCreateDateFormated(): string{
        return $this->create_date?date('d.m.Y',strtotime($this->create_date)):'n/a';
    }
    /**
     * @param \datetime $create_date
     */
    public function setCreateDate(\datetime $create_date): void
    {
        $this->create_date = $create_date;
    }

    /**
     * @return string
     */
    public function getCatName(): string
    {
        return $this->cat_name;
    }

    /**
     * @param string $cat_name
     */
    public function setCatName(string $cat_name): void
    {
        $this->cat_name = $cat_name;
    }


}