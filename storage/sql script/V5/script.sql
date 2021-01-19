DROP PROCEDURE `sp_getNewsletter`; 
CREATE PROCEDURE `sp_getNewsletter`() 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name, ne.title AS url FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 ORDER BY ne.created_at DESC LIMIT 8;

DROP procedure IF EXISTS `sp_getNewsletterFilterByCategory`;
CREATE PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT) 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name, ne.title AS url FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 AND ne.category_id = cat_id ORDER BY ne.created_at DESC LIMIT 8;

ALTER TABLE `newsletters` CHANGE `isDeleted` `isDeleted` TINYINT(1) NOT NULL DEFAULT '1';

DROP procedure IF EXISTS `sp_CountNews`;
CREATE PROCEDURE `sp_CountNews`() 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT COUNT(id) AS countNews FROM newsletters WHERE TIMESTAMPDIFF(DAY, `created_at`, NOW()) < 8 AND isDeleted = 0;

ALTER TABLE `categories` ADD `updated_by` INT NOT NULL AFTER `updated_at`;

DROP procedure IF EXISTS `sp_getNewsletter`;

DELIMITER $$

CREATE PROCEDURE `sp_getNewsletter`(IN `allFields` BOOLEAN)
    NO SQL
BEGIN

	IF allFields = 0 THEN
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
		ORDER BY ne.created_at DESC
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
		ORDER BY ne.created_at DESC
		LIMIT 8, 1000;
	END IF;
END$$

DELIMITER ;






