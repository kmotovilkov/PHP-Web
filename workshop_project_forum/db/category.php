<?php
function getAllCategories(PDO $db): array
{
    $query = "SELECT c.id, c.name,COUNT(c.id) AS questions_count 
FROM categories AS c LEFT JOIN questions AS q ON c.id= q.category_id
GROUP BY c.id, c.name ORDER BY questions_count DESC , c.name ASC";

    return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
}
