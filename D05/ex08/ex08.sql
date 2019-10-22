USE db_qbragard;
SELECT `last_name`, `first_name`, DATE(`birthdate`) AS 'birthdate'
FROM `user_card`
WHERE YEAR(`birthdate`) = '1989'
ORDER BY 1;