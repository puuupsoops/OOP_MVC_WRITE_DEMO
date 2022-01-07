// вывести список логинов пользователей которые сделали более двух заказов
SELECT * FROM `users`, `orders` WHERE users.id = orders.user_id


CREATE DATABASE IF NOT EXIST `work5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `work5`;

CREATE TABLE `users`(
    `id` int(11) NOT NULL,
    `email` varchar(55) NOT NULL,
    `login` varchar(55) NOT NULL
);

CREATE TABLE `orders`(
    `id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `price` int(11)
);
INSERT INTO registry (email,login,password,fio) VALUES ('odmen@test.ru','odmen','53252e6fb55c5c791158b825ce71f742','Одменов Одмен Одменович');

INSERT INTO users (id,email,login) VALUES (1,'admin@test.ru','admin');
INSERT INTO users (id,email,login) VALUES (2,'moder@test.ru','moder');
INSERT INTO users (id,email,login) VALUES (3,'test@test.ru','test');
INSERT INTO users (id,email,login) VALUES (4,'alex@test.ru','alex');
INSERT INTO users (id,email,login) VALUES (5,'alex@test.ru','alex');
INSERT INTO users (id,email,login) VALUES (6,'test@test.ru','test');

INSERT INTO orders (id,user_id,price) VALUES (101,3,120);
INSERT INTO orders (id,user_id,price) VALUES (102,3,150);
INSERT INTO orders (id,user_id,price) VALUES (103,3,180);
INSERT INTO orders (id,user_id,price) VALUES (104,3,1250);
INSERT INTO orders (id,user_id,price) VALUES (105,4,120);
INSERT INTO orders (id,user_id,price) VALUES (106,4,150);
INSERT INTO orders (id,user_id,price) VALUES (107,4,180);
INSERT INTO orders (id,user_id,price) VALUES (108,4,1250);

INSERT INTO orders (id,user_id,price) VALUES (109,2,1240);
INSERT INTO orders (id,user_id,price) VALUES (110,2,130);

INSERT INTO orders (id,user_id,price) VALUES (111,1,10);