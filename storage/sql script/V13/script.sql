RENAME TABLE `product_subacabados` TO `product_subacabados_bk`;


DROP PROCEDURE `sp_getInformationProduct`;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getInformationProduct`(IN `id_product` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN
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
