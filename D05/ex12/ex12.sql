USE db_qbragard;
SELECT `last_name`, `first_name`
FROM user_card
WHERE `last_name` LIKE '%-%'
OR `first_name` LIKE '%-%'
ORDER BY 1 ASC ,2 ASC;