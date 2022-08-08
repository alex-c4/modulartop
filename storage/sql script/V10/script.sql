ALTER TABLE `purchases` CHANGE `purchase_date` `purchase_date` DATE NOT NULL;


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
        p.id_product_type,
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




DROP procedure IF EXISTS `sp_getProducts_materiaPrima`;

DELIMITER $$
CREATE PROCEDURE `sp_getProducts_materiaPrima` (IN `id_type` INT, IN `id_subacabado` INT)
BEGIN
	SELECT 
		p.id AS id_product,
		p.id_product_type,
		pt.name AS name_product,
		p.name,
		p.description AS description_product,
		p.img_product AS img_product,
		p.id_product_color AS id_subcategory_color,
		pc.name AS name_subcategory_color
	FROM 
		products AS p 
		LEFT JOIN product_colors AS pc ON p.id_product_color=pc.id
		INNER JOIN product_types AS pt ON p.id_product_type=pt.id
	WHERE
		p.id_product_type=`id_type` AND -- 1=tablero, 2=tapacanto
		p.id_product_subacabado=`id_subacabado` AND -- 1=Alto brillo, 2=Super mate, 3=Estandar
		p.is_deleted = 0
	ORDER BY
			pc.name ASC;
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
        pt.id AS id_product_type,
        pt.name AS name_product_type,
        pst.name AS name_product_subtype,
        pa.name AS name_subcategory_acabado,
        psa.name AS name_subcategory_efecto_v,
        pm.name AS name_subcategory_material,
        ps.name AS name_subcategory_sustrato,
        pco.name AS name_subcategory_color
    FROM 
    	products as p 
        INNER JOIN product_categories AS pc ON p.id_product_category = pc.id
        INNER JOIN product_types AS pt ON p.id_product_type = pt.id
        INNER JOIN product_subtypes AS pst ON p.id_product_subtype = pst.id
        INNER JOIN product_acabados AS pa ON p.id_product_acabado = pa.id
        INNER JOIN product_subacabados AS psa ON p.id_product_subacabado = psa.id
        LEFT JOIN product_materials AS pm ON p.id_product_material = pm.id
        LEFT JOIN product_sustratos AS ps ON p.id_product_sustrato = ps.id
        LEFT JOIN product_colors AS pco ON p.id_product_color = pco.id
   	WHERE 
    	p.id = id_product;
END$$

DELIMITER ;




