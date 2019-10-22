USE db_qbragard;
SELECT MD5(CONVERT(REPLACE(CONCAT(`phone_number`, '42'),7 ,9), CHAR)) AS 'ft5'
FROM distrib
WHERE id_distrib = 84;

