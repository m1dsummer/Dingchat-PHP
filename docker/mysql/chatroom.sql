DROP database IF EXISTS `chatroom`;
CREATE database chatroom;

CREATE table chatroom.user (
    name char(16) NOT NULL UNIQUE,
    password char(16) NOT NULL,
    avatar char(16) NOT NULL
);

CREATE table chatroom.records (
    sender char(16) NOT NULL,
    gid char(16) NOT NULL,
    content varchar(16) NOT NULL,
    time TIMESTAMP DEFAULT NOW()
);

CREATE table chatroom.groups (
    name char(16) NOT NULL,
    member char(16) NOT NULL,
    icon char(16) NOT NULL
);

-- 创建默认用户
INSERT INTO chatroom.user (name,password,avatar) VALUES ("Summer","ThisIsSummer","1.png");

-- 创建默认聊天室
INSERT INTO chatroom.goups (name,member,icon) VALUES ("Summer","Summer","1.png");