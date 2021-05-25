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