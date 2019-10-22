USE db_qbragard;
SELECT g.`id_genre`, g.`name` AS `name_genre`, d.`id_distrib`, d.`name` AS 'distrib_name',   f.`title` AS 'title_film'
FROM genre AS g RIGHT JOIN film as f ON g.`id_genre` = f.`id_genre`
LEFT JOIN distrib AS d ON d.`id_distrib` = f.`id_distrib`
WHERE g.`id_genre` > 3
AND g.`id_genre` < 9;