USE db_qbragard;
SELECT COUNT(`id_sub`) AS 'nb_abo', FLOOR(AVG(`price`)) AS 'moy_abo', SUM(`duration_sub`) % 42 AS 'ft'
FROM subscription; 