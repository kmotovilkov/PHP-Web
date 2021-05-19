SELECT department_id, CAST(CAST(AVG(salary) AS DECIMAL(16,2)) AS FLOAT) AS 'Average Salary'
FROM employees
GROUP BY department_id
