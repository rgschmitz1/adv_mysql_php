CREATE DATABASE IF NOT EXISTS project4;

USE project4;

CREATE TABLE IF NOT EXISTS `tasks` (
    `id` INT AUTO_INCREMENT,
    `description` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT,
    `username` VARCHAR(30),
    `password` CHAR(40),
    `time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `transactions` (
    `id` INT AUTO_INCREMENT,
    `username` VARCHAR(30),
    `request` INT,
    `time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `users` (username, password) VALUES ('admin', SHA('admin'));
