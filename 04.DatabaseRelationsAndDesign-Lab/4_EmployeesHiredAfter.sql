SELECT e.first_name, e.last_name, e.hire_date, d.name AS dept_name
FROM employees AS e
JOIN departments AS d ON e.department_id=d.department_id
WHERE e.hire_date > STR_TO_DATE ('1/1/1999','%d/%m/%Y') AND d.name='Sales' OR d.name='Finance'
ORDER BY	e.hire_date
