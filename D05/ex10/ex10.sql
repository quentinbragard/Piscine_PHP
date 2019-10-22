USE db_qbragard;
SELECT `title` AS 'Title', `summary` AS 'Summary', `prod_year`
FROM film
WHERE `id_genre` = (SELECT `id_genre` FROM genre WHERE `name` = 'erotic')
ORDER BY 3 DESC;