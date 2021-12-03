CREATE TABLE `hisbulm_results`.`results_2021` ( 
    `id` INT(100) NOT NULL AUTO_INCREMENT , 
    `roll` VARCHAR(250) NOT NULL ,
    `name` VARCHAR(250) NOT NULL , 
    `month` INT(12) NOT NULL , 
    `training_id` INT(10) NOT NULL , 
    `101` INT NULL DEFAULT NULL , `102` INT NULL DEFAULT NULL , `103` INT NULL DEFAULT NULL , `104` INT NULL DEFAULT NULL , `105` INT NULL DEFAULT NULL , `106` INT NULL DEFAULT NULL , `107` INT NULL DEFAULT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- Drop ID
ALTER TABLE `results_2021`
  DROP `id`;


-- check duplicate
/* SELECT
    roll, COUNT(roll)
FROM 
    takmil
GROUP BY
    roll
HAVING 
    COUNT(roll) > 1; */
