-- Database "survey" anlegen --
CREATE DATABASE IF NOT EXISTS `survey` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `survey`;

-- Tabelle "user_table" anlegen --
CREATE TABLE `user_table` (
  `Id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Name` VARCHAR(30) NOT NULL
) ENGINE = InnoDB;

-- Tabelle "survey_table" anlegen --
CREATE TABLE `survey_table` (
  `Id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `UserId` SMALLINT UNSIGNED NOT NULL,
  `Datum` DATE NOT NULL,
  `Q1` CHAR(4) NOT NULL COLLATE ascii_general_ci,
  `Q2` VARCHAR(4) NOT NULL,
  `Q3` VARCHAR(8) NOT NULL,
  `Q4` TEXT NOT NULL,
  `Q5` TEXT NOT NULL,
  -- UserId = Fremdschlüssel auf die Id eines Users in "user_table" --
  CONSTRAINT `fk_survey_user` 
    FOREIGN KEY (`UserId`) REFERENCES `user_table` (`Id`) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- User hinzufügen in "user_table" --
INSERT INTO `user_table` (`Name`) VALUES 
  ('anonymous'), 
  ('Lara'), 
  ('Luisa');