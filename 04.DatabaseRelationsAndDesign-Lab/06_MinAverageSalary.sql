SELECT MIN(average) AS min_average_salary
FROM	(
SELECT AVG	(salary) AS average
FROM employees
GROUP BY department_id
) AS agerage_salary
