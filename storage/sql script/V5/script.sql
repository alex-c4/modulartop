DROP PROCEDURE `sp_getNewsletter`; 
CREATE PROCEDURE `sp_getNewsletter`() 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name, ne.title AS url FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 ORDER BY ne.created_at DESC LIMIT 8;

CREATE PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT) 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name, ne.title AS url FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 AND ne.category_id = cat_id ORDER BY ne.created_at DESC LIMIT 8;

ALTER TABLE `newsletters` CHANGE `isDeleted` `isDeleted` TINYINT(1) NOT NULL DEFAULT '1';


CREATE PROCEDURE `sp_CountNews`() 
NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT COUNT(id) AS countNews FROM newsletters WHERE TIMESTAMPDIFF(DAY, `created_at`, NOW()) < 8 AND isDeleted = 0;

ALTER TABLE `categories` ADD `updated_by` INT NOT NULL AFTER `updated_at`;




