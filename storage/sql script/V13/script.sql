RENAME TABLE `product_subacabados` TO `product_subacabados_bk`;


DROP PROCEDURE `sp_getInformationProduct`;
CREATE PROCEDURE `sp_getInformationProduct`(IN `id_product` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN
	SELECT 
    	p.id AS id_product,
        p.code AS code_product,
        p.price AS price_product,
    	p.name AS name_product,
        p.description AS description_product,
        -- p.pdf_file AS pdffile_product,
        p.img_product AS img_product,
        pc.name AS name_product_category,
        pt.id AS id_product_type,
        pt.name AS name_product_type,
        pst.name AS name_product_subtype,
        pa.name AS name_subcategory_acabado,
        pm.name AS name_subcategory_material,
        ps.name AS name_subcategory_sustrato,
        pco.name AS name_subcategory_color
    FROM 
    	products as p 
        INNER JOIN product_categories AS pc ON p.id_product_category = pc.id
        INNER JOIN product_types AS pt ON p.id_product_type = pt.id
        INNER JOIN product_subtypes AS pst ON p.id_product_subtype = pst.id
        INNER JOIN product_acabados AS pa ON p.id_product_acabado = pa.id
        LEFT JOIN product_materials AS pm ON p.id_product_material = pm.id
        LEFT JOIN product_sustratos AS ps ON p.id_product_sustrato = ps.id
        LEFT JOIN product_colors AS pco ON p.id_product_color = pco.id
   	WHERE 
    	p.id = id_product;
END


ALTER TABLE `products` CHANGE `img_product` `img_product` VARCHAR(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `products` CHANGE `img_alt` `img_alt` VARCHAR(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;



ALTER TABLE `products` CHANGE `width` `width` DECIMAL(6,2) NULL DEFAULT '0', CHANGE `thickness` `thickness` DECIMAL(6,2) NULL DEFAULT '0', CHANGE `length` `length` DECIMAL(6,2) NULL DEFAULT '0';


CREATE TABLE `catalogs` ( `id` INT NOT NULL AUTO_INCREMENT , `id_product_type` INT NOT NULL , `id_aliado` INT NOT NULL ,`file_name` VARCHAR(200) NOT NULL , `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_by` INT NOT NULL , `updated_at` DATETIME NULL , `updated_by` INT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `proyectistas` CHANGE `prefix` `prefix` VARCHAR(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;

ALTER TABLE `products` CHANGE `name` `name` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;


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
LIMIT 8




DELIMITER $$
CREATE PROCEDURE `sp_getInventory`(IN `productName` VARCHAR(300))
    NO SQL
BEGIN
	IF productName != '' THEN
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
            i.quantity > 0 AND
            p.name like CONCAT('%', productName, '%')
        ORDER BY
            pc.name ASC;
    ELSE
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
    END IF;
	

END$$
DELIMITER ;


CREATE TABLE `aliados` ( `id` INT NOT NULL AUTO_INCREMENT , `name`, VARCHAR(30) NOT NULL, `prefix` VARCHAR(30) NOT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `catalogs` CHANGE `id_proyectista` `id_aliado` INT(11) NOT NULL;