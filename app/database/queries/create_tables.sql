CREATE TABLE `routinenotes`.`users`
( `userId` INT NOT NULL AUTO_INCREMENT ,
 `email` VARCHAR(255) NOT NULL ,
 `password` VARCHAR(100) NOT NULL ,
 `role` INT NOT NULL ,
 PRIMARY KEY (`userId`)
 ) ENGINE = InnoDB;

CREATE TABLE `routinenotes`.`muscles`
( `muscleId` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(100) NOT NULL ,
 PRIMARY KEY (`muscleId`)
 ) ENGINE = InnoDB;