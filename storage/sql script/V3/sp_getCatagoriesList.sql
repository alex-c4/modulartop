DELIMITER $$
CREATE PROCEDURE `sp_getCatagoriesList`()
    NO SQL
SELECT 
	COUNT(ne.category_id) as cant, 
    ca.name,
    ca.id
FROM newsletters AS ne 
INNER JOIN categories AS ca ON ca.id=ne.category_id 
GROUP BY ne.category_id$$
DELIMITER ;