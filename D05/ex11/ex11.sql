USE db_qbragard;
SELECT UPPER(a.`last_name`) AS 'NAME', a.`first_name`, c.`price` FROM user_card AS a
JOIN member AS b 
ON a.`id_user` = b.`id_user_card`
JOIN subscription AS c ON b.`id_sub` = c.`id_sub`
WHERE c.price > 42 ORDER BY 1,2 ASC;