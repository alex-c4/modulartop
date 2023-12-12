ALTER TABLE `product_categories` ADD `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `name`;
ALTER TABLE `product_types` ADD `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `name`;
ALTER TABLE `product_subtypes` ADD `is_deleted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `name`;