CREATE TABLE `users`
(
    `id`        int PRIMARY KEY AUTO_INCREMENT,
    `login`     varchar(50)  NOT NULL UNIQUE,
    `password`  varchar(100) NOT NULL,
    `email`     varchar(50)  NOT NULL UNIQUE,
    `user_name` varchar(50)  NOT NULL,
    `role`      varchar(10)  NOT NULL DEFAULT 'member'
) DEFAULT CHARSET = utf8;