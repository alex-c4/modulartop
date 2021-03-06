DELIMITER $$
CREATE PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT)
    NO SQL
SELECT 
	ne.id,
    ne.title,
    ne.created_at,
    ne.name_img,
    ne.content,
    cat.name
FROM newsletters AS ne 
	INNER JOIN categories AS cat ON ne.category_id=cat.id
WHERE 
	ne.isDeleted = 0 AND
	ne.category_id = cat_id
ORDER BY ne.created_at DESC
LIMIT 8$$
DELIMITER ;