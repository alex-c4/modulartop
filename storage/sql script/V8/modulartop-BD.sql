-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 17:58:27
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulartop`
--
DROP DATABASE IF EXISTS `modulartop`;
CREATE DATABASE IF NOT EXISTS `modulartop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `modulartop`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_addInventoryAuditory`$$
CREATE PROCEDURE `sp_addInventoryAuditory` (IN `idPurchase` INT, IN `idProduct` INT, IN `qty` INT, IN `oper` INT, IN `createdAt` DATETIME, IN `createdBy` INT)  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_CountNews`$$
CREATE PROCEDURE `sp_CountNews` ()  NO SQL
SELECT 
	COUNT(id) AS countNews
FROM newsletters 
WHERE 
	TIMESTAMPDIFF(DAY, `created_at`, NOW()) < 8 
    AND isDeleted = 0$$

DROP PROCEDURE IF EXISTS `sp_descontarInventario`$$
CREATE PROCEDURE `sp_descontarInventario` (IN `qty` INT, IN `idProduct` INT)  NO SQL
BEGIN
	SELECT @cantidad:=quantity FROM inventory WHERE id_product = idProduct ;
    
	UPDATE inventory SET quantity=@cantidad-qty WHERE id_product=idProduct; 
END$$

DROP PROCEDURE IF EXISTS `sp_getCatagoriesList`$$
CREATE PROCEDURE `sp_getCatagoriesList` ()  NO SQL
SELECT 
	COUNT(ne.category_id) as cant, 
    ca.name,
    ca.id
FROM newsletters AS ne 
INNER JOIN categories AS ca ON ca.id=ne.category_id 
WHERE ne.isDeleted = 0
GROUP BY ne.category_id$$

DROP PROCEDURE IF EXISTS `sp_getInformationProduct`$$
CREATE PROCEDURE `sp_getInformationProduct` (IN `id_product` INT)  BEGIN
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

DROP PROCEDURE IF EXISTS `sp_getInventory`$$
CREATE PROCEDURE `sp_getInventory` ()  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_getNewsletter`$$
CREATE PROCEDURE `sp_getNewsletter` (IN `allFields` BOOLEAN)  NO SQL
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
END$$

DROP PROCEDURE IF EXISTS `sp_getNewsletterByTagId`$$
CREATE PROCEDURE `sp_getNewsletterByTagId` (IN `id_tag` INT, IN `allFields` BOOLEAN)  NO SQL
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
			nw.title AS url
		FROM newsletters AS nw 
			INNER JOIN newsletter_tags AS nwt ON nw.id=nwt.id_newsletter 
			INNER JOIN categories AS cat ON nw.category_id=cat.id
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
			nw.title AS url
		FROM newsletters AS nw 
			INNER JOIN newsletter_tags AS nwt ON nw.id=nwt.id_newsletter 
			INNER JOIN categories AS cat ON nw.category_id=cat.id
		WHERE 
			nwt.id_tag=id_tag AND
			nw.isDeleted = 0 
		ORDER BY nw.published_at DESC
		LIMIT 8, 1000;
	END IF;

END$$

DROP PROCEDURE IF EXISTS `sp_getNewsletterFilterByCategory`$$
CREATE PROCEDURE `sp_getNewsletterFilterByCategory` (IN `cat_id` INT)  NO SQL
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
LIMIT 8$$

DROP PROCEDURE IF EXISTS `sp_getProductBy_product_subcategory_classification`$$
CREATE PROCEDURE `sp_getProductBy_product_subcategory_classification` (IN `id` INT)  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_getSales`$$
CREATE PROCEDURE `sp_getSales` ()  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_getTags`$$
CREATE PROCEDURE `sp_getTags` ()  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_getTagsByNewsletterId`$$
CREATE PROCEDURE `sp_getTagsByNewsletterId` (IN `id_newsletter` INT)  NO SQL
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

DROP PROCEDURE IF EXISTS `sp_updateInventory_enprueba`$$
CREATE PROCEDURE `sp_updateInventory_enprueba` (IN `idProduct` INT, IN `qty` INT, IN `opt` BOOLEAN)  NO SQL
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company_types`
--

DROP TABLE IF EXISTS `company_types`;
CREATE TABLE `company_types` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameContact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastNameContact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailContact` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `name_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form` int(11) NOT NULL COMMENT '1=contactos, 2=fabricacion, 3=subscripcion boton flotante',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_products`
--

DROP TABLE IF EXISTS `image_products`;
CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory_audit`
--

DROP TABLE IF EXISTS `inventory_audit`;
CREATE TABLE `inventory_audit` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL DEFAULT '0',
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `operation` tinyint(1) NOT NULL COMMENT '1=entrada; 0=salida',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `tags` text,
  `name_img` text NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter_tags`
--

DROP TABLE IF EXISTS `newsletter_tags`;
CREATE TABLE `newsletter_tags` (
  `id_newsletter` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_sales`
--

DROP TABLE IF EXISTS `order_sales`;
CREATE TABLE `order_sales` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `file_name` varchar(60) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '0=cancelada, 1=procesada, 2=iniciada, 3=en proceso'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `id_product_category` int(11) NOT NULL,
  `id_product_type` int(11) NOT NULL,
  `id_subcategory_acabado` int(11) NOT NULL,
  `id_subcategory_efecto_v` int(11) NOT NULL,
  `id_subcategory_material` int(11) NOT NULL,
  `id_subcategory_origen` int(11) NOT NULL,
  `id_subcategory_sustrato` int(11) NOT NULL,
  `id_subcategory_color` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float(11,2) NOT NULL,
  `img_product` varchar(120) NOT NULL,
  `pdf_file` varchar(120) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subcategory`
--

DROP TABLE IF EXISTS `product_subcategory`;
CREATE TABLE `product_subcategory` (
  `id` int(11) NOT NULL,
  `id_product_type` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subcategory_classification`
--

DROP TABLE IF EXISTS `product_subcategory_classification`;
CREATE TABLE `product_subcategory_classification` (
  `id` int(11) NOT NULL,
  `id_product_subcategory` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_types`
--

DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `cover_photo` varchar(120) NOT NULL,
  `plane_photo` varchar(120) DEFAULT NULL,
  `ubication` text,
  `client_name` varchar(60) DEFAULT NULL,
  `project_date` date DEFAULT NULL,
  `partner_company` varchar(60) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

DROP TABLE IF EXISTS `providers`;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `id_provider` int(11) NOT NULL,
  `id_invoice` char(30) NOT NULL,
  `observations` text,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_items`
--

DROP TABLE IF EXISTS `purchase_items`;
CREATE TABLE `purchase_items` (
  `id` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_date` datetime NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_invoice_sale` varchar(30) NOT NULL,
  `id_order_sale` int(11) NOT NULL DEFAULT '0',
  `observations` text,
  `invoice_filepdf` varchar(60) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_items`
--

DROP TABLE IF EXISTS `sale_items`;
CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `validationByAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_client` tinyint(1) NOT NULL DEFAULT '0',
  `rif` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_type_id` int(11) DEFAULT NULL,
  `razonSocial` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyAddress` text COLLATE utf8mb4_unicode_ci,
  `companyPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyLogo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_id` int(11) NOT NULL DEFAULT '2' COMMENT '2 es el valor por defecto, Rol Guest',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_inactive`
--

DROP TABLE IF EXISTS `user_inactive`;
CREATE TABLE `user_inactive` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cause` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company_types`
--
ALTER TABLE `company_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_product`);

--
-- Indices de la tabla `inventory_audit`
--
ALTER TABLE `inventory_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletter_tags`
--
ALTER TABLE `newsletter_tags`
  ADD UNIQUE KEY `id_newsletter` (`id_newsletter`,`id_tag`);

--
-- Indices de la tabla `order_sales`
--
ALTER TABLE `order_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_subcategory_classification`
--
ALTER TABLE `product_subcategory_classification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_inactive`
--
ALTER TABLE `user_inactive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `company_types`
--
ALTER TABLE `company_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventory_audit`
--
ALTER TABLE `inventory_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_sales`
--
ALTER TABLE `order_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_subcategory_classification`
--
ALTER TABLE `product_subcategory_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_inactive`
--
ALTER TABLE `user_inactive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `newsletter_tags`
--
ALTER TABLE `newsletter_tags`
  ADD CONSTRAINT `foreignKeyNewsletter` FOREIGN KEY (`id_newsletter`) REFERENCES `newsletters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
