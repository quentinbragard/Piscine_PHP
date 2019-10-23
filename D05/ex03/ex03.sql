USE db_qbragard;
INSERT INTO ft_table(`login`, `group`, `creation_date`)
SELECT a.`last_name`, "other" AS `group`, a.`birthdate`
FROM user_card AS a 
WHERE LENGTH(a.`last_name`) < 9
AND a.`last_name` LIKE '%a%' ORDER BY 1 LIMIT 10;