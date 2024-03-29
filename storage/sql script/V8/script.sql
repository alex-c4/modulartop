ALTER TABLE `users`  ADD `lastName` VARCHAR(20) NOT NULL  AFTER `name`,
    ADD `confirmed` BOOLEAN NOT NULL DEFAULT FALSE  AFTER `email_verified_at`,  
    ADD `confirmation_code` VARCHAR(25) NULL  AFTER `confirmed`
    ADD `avatar` VARCHAR(30) NULL  AFTER `password`,  
    ADD `phone` VARCHAR(15) NULL  AFTER `avatar`,  
    ADD `address` TEXT NULL  AFTER `phone`,  
    ADD `rif` VARCHAR(20) NULL  AFTER `address`,  
    ADD `razonSocial` VARCHAR(50) NULL  AFTER `rif`,  
    ADD `companyAddress` TEXT NULL  AFTER `razonSocial`,  
    ADD `companyPhone` VARCHAR(15) NULL  AFTER `companyAddress`,  
    ADD `companyLogo` VARCHAR(30) NULL  AFTER `companyPhone`;




DROP procedure IF EXISTS `sp_getNewsletterByTagId`;

DELIMITER $$

CREATE PROCEDURE `sp_getNewsletterByTagId`(IN `id_tag` INT, IN `allFields` BOOLEAN)
    NO SQL
BEGIN
	IF allFields = 0 THEN
		SELECT 
			nw.id,
			nw.title,
			nw.created_at,
			nw.published_at,
			nw.name_img,
			nw.content,
			nw.summary,
			cat.name,
			nw.title AS url,
            u.name AS userName,
            u.lastName AS userLastName
		FROM newsletters AS nw 
			INNER JOIN newsletter_tags AS nwt ON nw.id=nwt.id_newsletter 
			INNER JOIN categories AS cat ON nw.category_id=cat.id
            INNER JOIN users AS u ON u.id = nw.user_id
		WHERE 
			nwt.id_tag=id_tag AND
			nw.isDeleted = 0 
		ORDER BY nw.published_at DESC
		LIMIT 8;
    ELSE
		SELECT
			nw.id,
			nw.title,
			nw.created_at,
			nw.published_at,
			nw.name_img,
			nw.content,
			nw.summary,
			cat.name,
			nw.title AS url,
            u.name AS userName,
            u.lastName AS userLastName
		FROM newsletters AS nw 
			INNER JOIN newsletter_tags AS nwt ON nw.id=nwt.id_newsletter 
			INNER JOIN categories AS cat ON nw.category_id=cat.id
            INNER JOIN users AS u ON u.id = nw.user_id
		WHERE 
			nwt.id_tag=id_tag AND
			nw.isDeleted = 0 
		ORDER BY nw.published_at DESC
		LIMIT 8, 1000;
	END IF;

END$$

DELIMITER ;




INSERT INTO `roles` (`id`, `name`) VALUES (NULL, 'Client');


ALTER TABLE `users`  ADD `validationByAdmin` BOOLEAN NOT NULL DEFAULT FALSE  AFTER `confirmed`;
ALTER TABLE `users` ADD `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `remember_token`;
ALTER TABLE `users` ADD `is_client` BOOLEAN NOT NULL DEFAULT FALSE AFTER `address`;




DROP procedure IF EXISTS `sp_getTags`;

DELIMITER $$

CREATE PROCEDURE `sp_getTags`()
    NO SQL
BEGIN
    SELECT 
        `tags`.`id`, 
        `tags`.`name`, 
        `newsletter_tags`.`updated_at` 
    FROM 
        `newsletter_tags` 
    INNER JOIN `tags` on `tags`.`id` = `newsletter_tags`.`id_tag` 
    GROUP BY 
        `tags`.`name`, 
        `tags`.`id` 
    ORDER BY 
        `newsletter_tags`.`updated_at` DESC;
        
END$$

DELIMITER ;



DROP procedure IF EXISTS `sp_getTagsByNewsletterId`;

DELIMITER $$

CREATE PROCEDURE `sp_getTagsByNewsletterId`(IN `id_newsletter` INT)
    NO SQL
BEGIN
    SELECT 
        `tags`.`id`, 
        `tags`.`name`, 
        `newsletter_tags`.`updated_at` 
    FROM 
        `newsletter_tags` 
    INNER JOIN `tags` on `tags`.`id` = `newsletter_tags`.`id_tag` 
	WHERE
    	`newsletter_tags`.`id_newsletter` = id_newsletter
    GROUP BY 
        `tags`.`name`, 
        `tags`.`id` 
    ORDER BY 
        `newsletter_tags`.`updated_at` DESC;
        
END$$

DELIMITER ;




-- SPrint 4

DROP procedure IF EXISTS `sp_getProductBy_product_subcategory_classification`;

DELIMITER $$
CREATE PROCEDURE `sp_getProductBy_product_subcategory_classification`(IN `id` INT)
    NO SQL
BEGIN
	SELECT 
    	p.id AS id_product,
    	p.name AS name_product,
        p.id_subcategory_color AS id_subcategory_color,
        p.description AS description_product,
        (SELECT name FROM image_products AS ip WHERE ip.id_product = p.id LIMIT 0, 1) AS img_product,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_color  ) AS name_subcategory_color
    FROM 
    	products as p 
   	WHERE 
    	p.id_subcategory_efecto_v = id
	ORDER BY
		id_subcategory_color ASC;
        
END$$

DELIMITER ;






DROP procedure IF EXISTS `sp_getInformationProduct`;

DELIMITER $$

CREATE PROCEDURE `sp_getInformationProduct`(IN `id_product` INT)
BEGIN
	SELECT 
    	p.id AS id_product,
        p.code AS code_product,
        p.price AS price_product,
    	p.name AS name_product,
        p.description AS description_product,
        p.pdf_file AS pdffile_product,
        pc.name AS name_product_category,
        pt.name AS name_product_type,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_acabado  ) AS name_subcategory_acabado,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_efecto_v  ) AS name_subcategory_efecto_v,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_material  ) AS name_subcategory_material,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_sustrato  ) AS name_subcategory_sustrato,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_color  ) AS name_subcategory_color
    FROM 
    	products as p 
        INNER JOIN product_categories AS pc ON p.id_product_category = pc.id
        INNER JOIN product_types AS pt ON p.id_product_type = pt.id
   	WHERE 
    	p.id = id_product;
END$$

DELIMITER ;


-- Sprint 5

ALTER TABLE `products` ADD `img_product` VARCHAR(120) NOT NULL AFTER `price`;

ALTER TABLE `inventory_audit` ADD `id_sale` INT NOT NULL DEFAULT '0' AFTER `id_purchase`;

-- Borar campo other_category de la tabla products


DROP procedure IF EXISTS `sp_addInventoryAuditory`;

DELIMITER $$

CREATE PROCEDURE `sp_addInventoryAuditory`(IN `idPurchase` INT, IN `idProduct` INT, IN `qty` INT, IN `oper` INT, IN `createdAt` DATETIME, IN `createdBy` INT)
    NO SQL
BEGIN
	INSERT INTO inventory_audit(
    	id_purchase,
        id_product,
        quantity,
        operation,
        created_at,
        created_by
    )
    VALUES(
    	idPurchase,
        idProduct,
        qty,
        oper,
        createdAt,
        createdBy
    );
    
END$$

DELIMITER ;





DROP procedure IF EXISTS `sp_descontarInventario`;

DELIMITER $$

CREATE PROCEDURE `sp_descontarInventario`(IN `qty` INT, IN `idProduct` INT)
    NO SQL
BEGIN
	SELECT @cantidad:=quantity FROM inventory WHERE id_product = idProduct ;
    
	UPDATE inventory SET quantity=@cantidad-qty WHERE id_product=idProduct; 
    
END$$

DELIMITER ;


DROP procedure IF EXISTS `sp_getCatagoriesList`;

DELIMITER $$

CREATE PROCEDURE `sp_getCatagoriesList`()
    NO SQL
SELECT 
	COUNT(ne.category_id) as cant, 
    ca.name,
    ca.id
FROM newsletters AS ne 
INNER JOIN categories AS ca ON ca.id=ne.category_id 
WHERE ne.isDeleted = 0
GROUP BY ne.category_id$$

DELIMITER ;




DROP procedure IF EXISTS `sp_getInformationProduct`;

DELIMITER $$

CREATE PROCEDURE `sp_getInformationProduct`(IN `id_product` INT)
BEGIN
	SELECT 
    	p.id AS id_product,
        p.code AS code_product,
        p.price AS price_product,
    	p.name AS name_product,
        p.description AS description_product,
        p.pdf_file AS pdffile_product,
        p.img_product AS img_product,
        pc.name AS name_product_category,
        pt.name AS name_product_type,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_acabado  ) AS name_subcategory_acabado,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_efecto_v  ) AS name_subcategory_efecto_v,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_material  ) AS name_subcategory_material,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_sustrato  ) AS name_subcategory_sustrato,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_color  ) AS name_subcategory_color
    FROM 
    	products as p 
        INNER JOIN product_categories AS pc ON p.id_product_category = pc.id
        INNER JOIN product_types AS pt ON p.id_product_type = pt.id
   	WHERE 
    	p.id = id_product;
        
END$$

DELIMITER ;


DROP procedure IF EXISTS `sp_getInventory`;


DELIMITER $$

CREATE PROCEDURE `sp_getInventory`()
    NO SQL
BEGIN

	SELECT 
    	i.quantity AS invQuantity,
    	p.name AS productName,
        ps.name AS productColor
    FROM 
    	inventory AS i INNER JOIN
        products as p ON i.id_product = p.id INNER JOIN
        product_subcategory_classification AS ps ON ps.id=p.id_subcategory_color
   	ORDER BY
    	ps.name ASC;
END$$

DELIMITER ;




DROP procedure IF EXISTS `sp_getProductBy_product_subcategory_classification`;

DELIMITER $$

CREATE PROCEDURE `sp_getProductBy_product_subcategory_classification`(IN `id` INT)
    NO SQL
BEGIN
	SELECT 
    	p.id AS id_product,
    	p.name AS name_product,
        p.id_subcategory_color AS id_subcategory_color,
        p.description AS description_product,
        p.img_product AS img_product,
        (SELECT name FROM product_subcategory_classification AS psc WHERE psc.id = p.id_subcategory_color  ) AS name_subcategory_color
    FROM 
    	products as p 
   	WHERE 
    	p.id_subcategory_efecto_v = id AND
        p.is_deleted = 0
	ORDER BY
		id_subcategory_color ASC;
        
END$$

DELIMITER ;




DROP procedure IF EXISTS `sp_getSales`;

DELIMITER $$

CREATE PROCEDURE `sp_getSales`()
    NO SQL
BEGIN
	SELECT 
    	s.id AS saleId,
    	DATE_FORMAT(s.sale_date, '%Y-%m-%d') AS saleDate,
        s.id_invoice_sale AS invoiceId,
        (SELECT name FROM users WHERE users.id = s.created_by) AS sellerName,
        (SELECT lastName FROM users WHERE users.id = s.created_by) AS sellerLastName,
        (SELECT name FROM users WHERE users.id = s.id_client) AS buyerName,
        (SELECT lastName FROM users WHERE users.id = s.id_client) AS buyerLastName
    FROM sales as s
    ORDER BY 
    	s.sale_date DESC;
        
END$$

DELIMITER ;



-- Sptint 6

UPDATE `roles` SET `name` = 'Marketing' WHERE `roles`.`id` = 3;

-- Sprint 7

ALTER TABLE `users` CHANGE `name` `name` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `users` CHANGE `email` `email` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `users` CHANGE `avatar` `avatar` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `purchases` CHANGE `id_invoice` `id_invoice` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `projects` CHANGE `cover_photo_alt_text` `cover_photo_alt_text` VARCHAR(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;


-- Sprint 8
UPDATE `roles` SET `name` = 'Standard', `nombre` = 'Estandar' WHERE `roles`.`id` = 2;
UPDATE `product_categories` SET `name` = 'Producto Terminado' WHERE `product_categories`.`id` = 2;

ALTER TABLE `product_types`  ADD `category_id` INT NOT NULL  AFTER `id`;
UPDATE `product_types` SET `category_id` = '1', `name` = 'Tableros' WHERE `product_types`.`id` = 1;
INSERT INTO `product_types` (`id`, `category_id`, `name`) VALUES (NULL, '1', 'Tapacanto');
DELETE FROM `product_categories` WHERE `product_categories`.`id` = 2
UPDATE `product_subcategory_classification` SET `name` = 'Tradicionales' WHERE `product_subcategory_classification`.`id` = 2;



DROP procedure IF EXISTS `sp_getProductBy_product_subcategory_classification`;

DELIMITER $$

CREATE PROCEDURE `sp_getProductBy_product_subcategory_classification`(IN `id` INT)
    NO SQL
BEGIN
	SELECT 
    	p.id AS id_product,
    	p.name AS name_product,
        p.id_product_color AS id_subcategory_color,
        p.description AS description_product,
        p.img_product AS img_product,
        (SELECT name FROM product_colors AS pc WHERE pc.id = p.id_product_color  ) AS name_subcategory_color
        
    FROM 
    	products as p 
   	WHERE 
    	p.id_product_subacabado = id AND
        p.is_deleted = 0
	ORDER BY
		name_subcategory_color ASC;
END$$

DELIMITER ;








DROP procedure IF EXISTS `sp_getInformationProduct`;

DELIMITER $$

CREATE PROCEDURE `sp_getInformationProduct`(IN `id_product` INT)
BEGIN
	SELECT 
    	p.id AS id_product,
        p.code AS code_product,
        p.price AS price_product,
    	p.name AS name_product,
        p.description AS description_product,
        -- p.pdf_file AS pdffile_product,
        p.img_product AS img_product,
        pc.name AS name_product_category,
        pt.name AS name_product_type,
        pa.name AS name_subcategory_acabado,
        psa.name AS name_subcategory_efecto_v,
        pm.name AS name_subcategory_material,
        ps.name AS name_subcategory_sustrato,
        pco.name AS name_subcategory_color
    FROM 
    	products as p 
        INNER JOIN product_categories AS pc ON p.id_product_category = pc.id
        INNER JOIN product_types AS pt ON p.id_product_type = pt.id
        INNER JOIN product_acabados AS pa ON p.id_product_acabado = pa.id
        INNER JOIN product_subacabados AS psa ON p.id_product_subacabado = psa.id
        INNER JOIN product_materials AS pm ON p.id_product_material = pm.id
        INNER JOIN product_sustratos AS ps ON p.id_product_sustrato = ps.id
        INNER JOIN product_colors AS pco ON p.id_product_color = pco.id
   	WHERE 
    	p.id = id_product;
END$$

DELIMITER ;




DROP procedure IF EXISTS `sp_getInventory`;

DELIMITER $$

CREATE PROCEDURE `sp_getInventory`()
    NO SQL
BEGIN

	SELECT 
    	i.quantity AS invQuantity,
    	p.name AS productName,
        p.code,
        p.width,
        p.thickness,
        p.length,
        p.price,
        pc.name AS productColor,
        pt.name AS productType,
        pa.name AS productAcabado,
        pm.name AS productMaterial,
        ps.name AS productSustrato
    FROM 
    	inventory AS i 
        INNER JOIN products as p ON i.id_product = p.id 
        LEFT JOIN product_colors AS pc ON pc.id = p.id_product_color
        INNER JOIN product_types AS pt ON pt.id = p.id_product_type
        LEFT JOIN product_acabados AS pa ON pa.id = p.id_product_acabado
        LEFT JOIN product_materials AS pm ON pm.id = p.id_product_material
        LEFT JOIN product_sustratos AS ps ON ps.id = p.id_product_sustrato
	WHERE
		p.is_deleted = 0 AND
        i.quantity > 0
   	ORDER BY
    	pc.name ASC;
END$$

DELIMITER ;




DROP procedure IF EXISTS `sp_getTags`;

DELIMITER $$

CREATE PROCEDURE `sp_getTags`()
    NO SQL
BEGIN
    SELECT 
        `tags`.`id`, 
        `tags`.`name`, 
        `newsletter_tags`.`updated_at` 
    FROM 
        `newsletter_tags` 
    INNER JOIN `tags` on `tags`.`id` = `newsletter_tags`.`id_tag` 
    INNER JOIN `newsletters` ON `newsletters`.`id` =  `newsletter_tags`.`id_newsletter`
    WHERE
		`newsletters`.`isDeleted` = 0
    GROUP BY 
        `tags`.`name`, 
        `tags`.`id` 
    ORDER BY 
        `newsletter_tags`.`updated_at` DESC;
END$$

DELIMITER ;




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
            ne.published_at,
			ne.name_img,
			ne.content,
			ne.summary,
			cat.name,
			ne.title AS url,
            u.name AS userName,
            u.lastName AS userLastName
		FROM newsletters AS ne 
			INNER JOIN categories AS cat ON ne.category_id=cat.id
            INNER JOIN users as u ON u.id=ne.user_id
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
END$$

DELIMITER ;



DROP procedure IF EXISTS `sp_getNewsletterFilterByCategory`;

DELIMITER $$

CREATE PROCEDURE `sp_getNewsletterFilterByCategory`(IN `cat_id` INT)
    NO SQL
SELECT 
	ne.id,
    ne.title,
    ne.created_at,
    ne.published_at,
    ne.name_img,
    ne.content,
    ne.summary,
    cat.name,
    ne.title AS url,
	u.name AS userName,
	u.lastName AS userLastName
FROM newsletters AS ne 
	INNER JOIN categories AS cat ON ne.category_id=cat.id
	INNER JOIN users as u ON u.id=ne.user_id
WHERE 
	ne.isDeleted = 0 AND
	ne.category_id = cat_id
ORDER BY ne.created_at DESC
LIMIT 8$$

DELIMITER ;



ALTER TABLE `contacts` 
ADD `whatsapp` VARCHAR(60) NULL AFTER `form`, 
ADD `linkedin` VARCHAR(60) NULL AFTER `whatsapp`, 
ADD `facebook` VARCHAR(60) NULL AFTER `linkedin`, 
ADD `instagram` VARCHAR(60) NULL AFTER `facebook`, 
ADD `pinterest` VARCHAR(60) NULL AFTER `instagram`;




