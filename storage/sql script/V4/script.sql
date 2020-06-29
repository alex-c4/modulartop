ALTER TABLE `newsletters` ADD `summary` VARCHAR(200) NOT NULL AFTER `title`;

DROP PROCEDURE `sp_getNewsletter`; 
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getNewsletter`() NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 ORDER BY ne.created_at DESC LIMIT 8 

DROP PROCEDURE `sp_getNewsletterFilterByCategory`; 
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER SELECT ne.id, ne.title, ne.created_at, ne.name_img, ne.content, ne.summary, cat.name FROM newsletters AS ne INNER JOIN categories AS cat ON ne.category_id=cat.id WHERE ne.isDeleted = 0 AND ne.category_id = cat_id ORDER BY ne.created_at DESC LIMIT 8 

