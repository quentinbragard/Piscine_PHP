USE db_qbragard;
SELECT COUNT(`id_film`) AS 'nb_short_films'
FROM film
WHERE `duration` <= 42;