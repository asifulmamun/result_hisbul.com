CREATE TABLE `results_2022` (
	`id` int NOT NULL AUTO_INCREMENT,
	`exam_code` int NOT NULL,
	`roll` varchar(250) NOT NULL,
	`name` varchar(250) NOT NULL,
	`101` int,
	`102` int,
	`103` int,
	`104` int,
	`105` int,
	`106` int,
	`107` int,
	`108` int,
	`109` int,
	`110` int,
	`111` int,
	`112` int,
	`113` int,
	`114` int,
	`115` int,
	`116` int,
	`117` int,
	`118` int,
	`119` int,
	`120` int,
	PRIMARY KEY (`id`)
);

CREATE TABLE `subject` (
	`sl` int NOT NULL AUTO_INCREMENT,
	`class_id` int NOT NULL,
	`subject_id` int NOT NULL,
	`subject_name` varchar(255) NOT NULL,
	`total_marks` int(10),
	`pass_marks` int(10),
	PRIMARY KEY (`sl`)
);

CREATE TABLE `exam` (
	`id` int NOT NULL AUTO_INCREMENT,
	`class_id` int NOT NULL,
	`exam_code` int NOT NULL UNIQUE,
	`exam_name` varchar(255),
	`year` int(4),
	PRIMARY KEY (`id`)
);

CREATE TABLE `class` (
	`id` int NOT NULL AUTO_INCREMENT,
	`class_name` varchar(255),
	`branch_name` varchar(255),
	`total_subject` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `meta_info` (
	`id` int NOT NULL AUTO_INCREMENT,
	`meta_key` varchar(255) NOT NULL UNIQUE,
	`meta_value` longtext,
	`comment` varchar(255),
	PRIMARY KEY (`id`)
);

ALTER TABLE `results_2022` ADD CONSTRAINT `results_2022_fk0` FOREIGN KEY (`exam_code`) REFERENCES `exam`(`exam_code`);

ALTER TABLE `subject` ADD CONSTRAINT `subject_fk0` FOREIGN KEY (`class_id`) REFERENCES `class`(`id`);

ALTER TABLE `exam` ADD CONSTRAINT `exam_fk0` FOREIGN KEY (`class_id`) REFERENCES `class`(`id`);





