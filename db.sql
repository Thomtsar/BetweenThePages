create table book
(id  DECIMAL(5,0) AUTO_INCREMENT NOT_NULL,
book_name varchar(80) NOT_NULL,
author varchar(80),
category varchar(80),
Author varchar(80),
pages DECIMAL(4,0),
approx_read_time DECIMAL(3,2)
published_date date(),
rating DECIMAL(2,2),
username varchar(80)
primary key(id,book_name)
);