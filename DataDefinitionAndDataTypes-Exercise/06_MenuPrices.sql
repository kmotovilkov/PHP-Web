SELECT category_id, ROUND(AVG(price),2) AS `Avarage price`, ROUND (MIN(price),2) `Cheapest Product`, ROUND(MAX(price),2) `Most Expensive Product`
FROM products
GROUP BY category_id 
