<?php

namespace Models;


use Database\PDODatabase;
use DTO\CategoryDTO;
use PDO;

class Categories
{
    /**
     * @var PDODatabase
     */
    private $db;

    /**
     * Products constructor.
     * @param PDODatabase $db
     */
    public function __construct(PDODatabase $db)
    {
        $this->db = $db;
    }

    public function getList():\Generator {
        $stm = $this->db->query('SELECT cat_id,cat_name 
                                        FROM categories');

        $result = $stm->execute();
        foreach ($result->fetch(CategoryDTO::class) as $row) {
            yield $row;
        }

    }
}