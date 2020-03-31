<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 10/29/2018
 * Time: 8:21 PM
 */

namespace DTO;


class CategoryDTO
{
    /**
     * @var int
     */
    private $cat_id;

    /**
     * @var string
     */
    private $cat_name;

    /**
     * @return int
     */
    public function getCatId(): int
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