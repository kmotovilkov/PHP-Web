<?php

class Categories
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Products constructor.
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getList() {
        $result = $this->db->query('SELECT cat_id,cat_name 
                                      FROM categories');

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            yield $row;
        }

    }
}