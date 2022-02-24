create database donate;

CREATE TABLE donation(
                         id int AUTO_INCREMENT,
                         fname varchar(255),
                         lname varchar(255),
                         phone varchar(255),
                         email varchar(255),
                         location varchar(255),
                         donateDate varchar(255),
                         donateAmount varchar(255),
                         message varchar(255),
                         PRIMARY KEY(ID)
);