ALTER TABLE `contacts` ADD `name_file` VARCHAR(100) NULL AFTER `message`;

ALTER TABLE `users` ADD `roll_id` INT NOT NULL DEFAULT '2' COMMENT '2 es el valor por defecto, Rol Guest' AFTER `password`;

