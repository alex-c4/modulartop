DELIMITER $$
CREATE PROCEDURE `sp_CountNews`()
    NO SQL
SELECT 
	COUNT(id) AS countNews
FROM newsletters 
WHERE 
	TIMESTAMPDIFF(DAY, `created_at`, NOW()) < 8 
    AND isDeleted = 0$$
DELIMITER ;

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

DELIMITER $$
CREATE PROCEDURE `sp_descontarInventario`(IN `qty` INT, IN `idProduct` INT)
    NO SQL
BEGIN
	SELECT @cantidad:=quantity FROM inventory WHERE id_product = idProduct ;
    
	UPDATE inventory SET quantity=@cantidad-qty WHERE id_product=idProduct; 
END$$
DELIMITER ;

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

DELIMITER $$
CREATE PROCEDURE `sp_salesStatistics`(IN `startDate` VARCHAR(10), IN `endDate` VARCHAR(10))
    NO SQL
BEGIN
	SELECT 
    	p.name,
    	sum(si.quantity) as total
	FROM sales AS s
	INNER JOIN sale_items AS si ON s.id=si.id_sale
	INNER JOIN products AS p ON p.id=si.id_product
WHERE 
	s.sale_date BETWEEN startDate AND endDate
GROUP BY 
	p.name;
    
END$$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `sp_updateInventory_enprueba`(IN `idProduct` INT, IN `qty` INT, IN `opt` BOOLEAN)
    NO SQL
BEGIN
	-- SET @productQty = 0;
    
	IF opt = 1 THEN -- opt=1 entrada
    	SELECT @productQty:=quantity FROM inventory WHERE id_product = idProduct;
        select @productQty as estam;
        IF @productQty >= 0 THEN
			select 'primerid';
			UPDATE inventory SET quantity = (@productQty + qty) WHERE id_product=idProduct; 
        ELSE
            select 'segundoid';
			INSERT INTO inventory (id_product, quantity) VALUES (idProduct, qty);
        END IF;
    ELSE -- opt=0 salida
    	SELECT @cantidad:=quantity FROM inventory WHERE id_product = idProduct ;
        IF @cantidad <> '' THEN
        	SELECT @result:=@cantidad-qty AS cantidad;
            IF @result >= 0 THEN
				UPDATE inventory SET quantity=@cantidad-qty WHERE id_product=idProduct; 
            END IF;
        END IF;
    END IF;
	
END$$
DELIMITER ;
