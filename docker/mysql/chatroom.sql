DROP database IF EXISTS `chatroom`;
CREATE database chatroom;

CREATE table chatroom.user (
    uid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name char(16) NOT NULL UNIQUE,
    password char(16) NOT NULL,
    avatar char(16) NOT NULL
);

CREATE table chatroom.records (
    mid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    sender char(16) NOT NULL,
    group_name char(16) NOT NULL,
    content varchar(1024) NOT NULL,
    type char(16) NOT NULL,
    time TIMESTAMP DEFAULT NOW()
);

CREATE table chatroom.rooms (
    rid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name char(16) NOT NULL,
    member char(16) NOT NULL,
    icon char(16) NOT NULL
);

-- 创建默认用户
INSERT INTO chatroom.user (name,password,avatar) VALUES ("admin","zxcasdqwe","1.png");

-- 创建默认聊天室
INSERT INTO chatroom.rooms (name,member,icon) VALUES ("Summer","admin","1.png");