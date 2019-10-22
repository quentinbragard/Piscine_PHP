USE db_qbragard;
SELECT `floor_number` AS 'floor', SUM(`nb_seats`) AS 'seats'
FROM cinema
GROUP BY `floor_number`
ORDER BY 2 DESC;