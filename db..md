
tables:
    - users
    - users_reservations


**users**
    - first_name
    - last_name
    - contact_num
    - email
    - password
    - level
    - user_id


**users_reservations**
    - reserve_date
    - reserve_time
    - table_id
    - user_id
    - status

CREATE TABLE `ny2I1jYO48`.`users` ( `user_id` INT(10) NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(256) NOT NULL , `last_name` VARCHAR(256) NOT NULL , `contact_num` BIGINT(20) NOT NULL , `email` VARCHAR(256) NOT NULL , `password` VARCHAR(256) NOT NULL , `level` INT(1) NOT NULL , UNIQUE (`user_id`)) ENGINE = InnoDB;


CREATE TABLE `ny2I1jYO48`.`users_reservations` ( `table_id` INT(100) NOT NULL AUTO_INCREMENT, `reserve_date` DATE NOT NULL , `reserve_time` TIMESTAMP NOT NULL , `status` INT(1) NOT NULL , `user_id` INT(10) NOT NULL , UNIQUE (`table_id`)) ENGINE = InnoDB;

ALTER TABLE `users_reservations` ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;


    // $host = "remotemysql.com";
    // $db_uname = "ny2I1jYO48";
    // $db_pass = "JAbLqeRCun";
    // $dbname = "ny2I1jYO48";