ALTER TABLE `newsletters` ADD `published_at` DATETIME NULL DEFAULT NULL AFTER `updated_by`;


DROP PROCEDURE `sp_getNewsletter`;
CREATE PROCEDURE `sp_getNewsletter`(IN `allFields` BOOLEAN) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN

	IF allFields = 0 THEN
		SELECT 
			ne.id,
			ne.title,
			ne.created_at,
            ne.published_at,
			ne.name_img,
			ne.content,
			ne.summary,
			cat.name,
			ne.title AS url
		FROM newsletters AS ne 
			INNER JOIN categories AS cat ON ne.category_id=cat.id
		WHERE 
			ne.isDeleted = 0 
		ORDER BY ne.published_at DESC
		LIMIT 8;
	ELSE
		SELECT 
			ne.id,
			ne.title,
			ne.created_at,
			ne.name_img,
			ne.content,
			ne.summary,
			cat.name,
			ne.title AS url
		FROM newsletters AS ne 
			INNER JOIN categories AS cat ON ne.category_id=cat.id
		WHERE 
			ne.isDeleted = 0 
		ORDER BY ne.published_at DESC
		LIMIT 8, 1000;
	END IF;
END

DROP PROCEDURE `sp_getNewsletterFilterByCategory`;
CREATE PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER 
SELECT 
	ne.id,
    ne.title,
    ne.created_at,
    ne.published_at,
    ne.name_img,
    ne.content,
    ne.summary,
    cat.name,
    ne.title AS url
FROM newsletters AS ne 
	INNER JOIN categories AS cat ON ne.category_id=cat.id
WHERE 
	ne.isDeleted = 0 AND
	ne.category_id = cat_id
ORDER BY ne.created_at DESC
LIMIT 8

UPDATE newsletters SET published_at = created_at WHERE isDeleted = 0




