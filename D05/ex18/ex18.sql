USE db_qbragard;
SELECT `name`
FROM distrib
WHERE UPPER(`name`) LIKE ("%Y%Y%")
OR id_distrib = 42
OR (id_distrib >= 62 AND id_distrib <= 71)
OR (id_distrib >= 88 AND id_distrib <= 90)
LIMIT 2, 5;