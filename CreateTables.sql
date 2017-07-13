-- Generated: 2017-07-12 18:24
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: user

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `Username` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Role` VARCHAR(45) NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Username`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Media` (
  `MediaID` INT(11) NOT NULL AUTO_INCREMENT,
  `File_Location` VARCHAR(45) NULL DEFAULT NULL,
  `Media_Type` VARCHAR(45) NULL DEFAULT NULL,
  `Date_Uploaded` DATETIME NULL DEFAULT NULL,
  `Picture/Video` VARCHAR(45) NULL DEFAULT NULL,
  `Price` DECIMAL(11,2) NULL DEFAULT NULL,
  `Thumbnail_Location` VARCHAR(45) NULL DEFAULT NULL,
  `Title` VARCHAR(45) NULL DEFAULT NULL,
  `User_Username` VARCHAR(50) NOT NULL,
  `Category_CategoryID` NOT NULL,
  PRIMARY KEY (`MediaID`, `User_Username`),
  INDEX `fk_Media_User1_idx` (`User_Username` ASC),
  CONSTRAINT `fk_Categories_CategoryID`
    FOREIGN KEY (`Categories_CategoryID`)
    REFERENCES `mydb`.`Category` (`CategoryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Media_User1`
    FOREIGN KEY (`User_Username`)
    REFERENCES `mydb`.`User` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Transactions` (
  `Sold_By` VARCHAR(50) NOT NULL,
  `Media_MediaID` INT(11) NOT NULL,
  `Purchased_By` VARCHAR(50) NOT NULL,
  `Order_Date` DATETIME NOT NULL,
  PRIMARY KEY (`Sold_By`, `Media_MediaID`, `Purchased_By`, `Order_Date`),
  INDEX `fk_table1_Media1_idx` (`Media_MediaID` ASC),
  INDEX `fk_table1_User1_idx` (`Purchased_By` ASC),
  CONSTRAINT `fk_table1_User`
    FOREIGN KEY (`Sold_By`)
    REFERENCES `mydb`.`User` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Media1`
    FOREIGN KEY (`Media_MediaID`)
    REFERENCES `mydb`.`Media` (`MediaID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_User1`
    FOREIGN KEY (`Purchased_By`)
    REFERENCES `mydb`.`User` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Media_Attributes` (
  `Media_MediaID` INT(11) NOT NULL,
  `Media_Attributes` VARCHAR(1000) NULL DEFAULT NULL,
  PRIMARY KEY (`Media_MediaID`),
  CONSTRAINT `fk_table1_Media2`
    FOREIGN KEY (`Media_MediaID`)
    REFERENCES `mydb`.`Media` (`MediaID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Messages` (
  `User1` VARCHAR(50) NOT NULL,
  `User2` VARCHAR(50) NOT NULL,
  `Message` VARCHAR(1000) NULL DEFAULT NULL,
  `Date` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`User1`, `User2`),
  INDEX `fk_Messages_User2_idx` (`User2` ASC),
  CONSTRAINT `fk_Messages_User1`
    FOREIGN KEY (`User1`)
    REFERENCES `mydb`.`User` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Messages_User2`
    FOREIGN KEY (`User2`)
    REFERENCES `mydb`.`User` (`Username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Categories` (
  `CategoryID` INT(11) NOT NULL AUTO_INCREMENT,
  `Category` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
