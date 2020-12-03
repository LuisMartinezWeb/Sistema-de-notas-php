CREATE TABLE users(
id              int(255) AUTO_INCREMENT NOT NULL,
name            varchar(50) NOT NULL,
surname         varchar(50) NOT NULL,
email           varchar(100) NOT NULL,
password        varchar(100) NOT NULL,
image           varchar(255), 
create_at       datetime DEFAULT NULL,
update_at       datetime DEFAULT NULL,
remember_token  varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE notes(
id              int(255) AUTO_INCREMENT NOT NULL,
user_id         int(255) NOT NULL,
title           varchar(100) NOT NULL,
content         text NOT NULL,
recycle         varchar(10),
create_at       datetime DEFAULT NULL,
update_at       datetime DEFAULT NULL,
CONSTRAINT pk_notas PRIMARY KEY(id),
CONSTRAINT pk_notas_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;
