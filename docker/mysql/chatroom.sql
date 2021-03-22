DROP database IF EXISTS `chatroom`;
CREATE database chatroom;

CREATE table chatroom.user (
    name char(16) NOT NULL UNIQUE,
    password char(16) NOT NULL
);

CREATE table chatroom.records (
    sender char(16) NOT NULL,
    gid char(16) NOT NULL,
    content varchar(16) NOT NULL,
    time TIMESTAMP DEFAULT NOW()
);

CREATE table chatroom.groups (
    name char(16) NOT NULL,
    member char(16) NOT NULL
);