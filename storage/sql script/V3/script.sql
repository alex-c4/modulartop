ALTER TABLE `contacts` ADD `name_file` VARCHAR(100) NULL AFTER `message`;

ALTER TABLE `users` ADD `roll_id` INT NOT NULL DEFAULT '2' COMMENT '2 es el valor por defecto, Rol Guest' AFTER `password`;

INSERT INTO `categories` (`id`, `name`, `isDeleted`, `created_at`, `updated_at`) 
VALUES 
(NULL, 'Decoración', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Diseño de interiores', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Servicios', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Tipos de muebles', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Historia del mueble', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), 
(NULL, 'Tendencia', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
