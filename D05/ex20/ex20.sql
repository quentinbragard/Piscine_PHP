USE db_qbragard;
SELECT g.`id_genre`, g.`name` AS `name_genre`, d.`id_distrib`, d.`name` AS 'distrib_name',   f.`title` AS 'title_film'
FROM film AS f LEFT JOIN genre as g ON f.`id_genre` = g.`id_genre`
LEFT JOIN distrib AS d ON d.`id_distrib` = f.`id_distrib`
WHERE g.`id_genre` > 3
AND g.`id_genre` < 9;