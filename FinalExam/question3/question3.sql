CREATE DATABASE IF NOT EXISTS `MATC`;

USE `MATC`;

CREATE TABLE IF NOT EXISTS `students` (
    `id` INT AUTO_INCREMENT,
    `name` VARCHAR(500),
    `email` VARCHAR(500),
    PRIMARY KEY (`id`)
);
