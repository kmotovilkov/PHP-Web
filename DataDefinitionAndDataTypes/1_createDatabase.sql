CREATE TABLE `minions`
(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL ,
`age` INT 	DEFAULT '0', 
`town_id` INT DEFAULT '0'  
);

CREATE TABLE `towns`
(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL  
);
