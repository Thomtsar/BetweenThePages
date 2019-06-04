<?php
    $query  = "CREATE TABLE book (";
    $query .="id int AUTO_INCREMENT NOT NULL,";
    $query .="title VARCHAR(80) NOT NULL,";
    $query .="author VARCHAR(80),";
    $query .="category VARCHAR(80),";
    $query .="pages DECIMAL(4,0), DEFAULT 1";
    $query .="cover TEXT,";
    $query .="approx_read_time DECIMAL(4,2), DEFAULT '20.0'";
    $query .="published_date DATE,";
    $query .="rating DECIMAL(4,2),";
    $query .="times_read DECIMAL(2,0), DEFAULT 1";
    $query .="username VARCHAR(80) DEFAULT 'User',";
    $query .="primary key(id,title));";

    $create_table_query = mysqli_query($connection,$query);

    checkquery($create_table_query);


    // 1
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Hunger Games', 'Suzanne Collins', 'Young Adult, Fiction,Fantasy',374,'The-Hunger-Games_novel.jpg',18.7,'2008-7-13',4.34,2,'Isaac') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);


    // 2
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('Harry Poter and the Order of the Phoenix', 'J.K. Rowling', 'Young Adult, Fantasy',870,'harry potter and the order of phoinix.jpg',43.5,'2004-8-10',4.47,1,'Euler') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 3
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('To Kill a Mockingbird ', 'Harper Lee', 'Classics, Academic',324,'To kill a mocking bird.jpg',16.2,'1960-7-11',4.26,5,'Bernoulli') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 4
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Book Thief', 'Markus Zusak', 'Fiction, Young Adult',552,'The book Thief.jpg',27.6,'2006-3-14',4.36,2,'Archimedes') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
  
    // 5
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('Animal Farm', 'George Orwell', 'Fiction, Classics',122,'Animal Farm.jpg',6.1,'1945-8-17',3.88,2,'Archimedes') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 6
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Fault in Our Stars', 'John Green', 'Young Adult, Fiction',313,'the fault in our stars.jpg',15.7,'2012-10-01',4.26,3,'Bernoulli') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 7
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('Memoirs of a Geisha', 'Arthur Golden', 'Historical, Romance',434,'Memoir of a Geisha.jpg',21.7,'1997-09-15',4.08,1,'Euler') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 8
    $query = "INSERT INTO book(title, author, category, pages, cover,approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Picture of Dorian Gray', 'Oscar Wilde', 'Classics, Horror',254,'The picture of dorian gray.jpg',12.7,'1890-1-06',4.06,3,'Isaac') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 9
    $query = "INSERT INTO book(title, author, category, pages, cover, approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Help', 'Kathryn Stockett', 'Historical, Adult',444,'the-help.jpg',22,'2009-10-02',4.45,2,'Euler') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
     // 10
    $query = "INSERT INTO book(title, author, category, pages, cover, approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('Brave New World', 'Aldous Huxley', 'Classics, Fiction',268,'Brave new world.jpg',13.4,'1932-1-09',3.97,2,'Bernoulli') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 11
    $query = "INSERT INTO book(title, author, category, pages, cover, approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('The Little Prince', 'Antoine de Saint-Exupéry', 'Childrens, Classics',93,'The little prince.jpg',1.55,'1945-4-06',4.29,2,'Archimedes') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    // 12
    $query = "INSERT INTO book(title, author, category, pages, cover, approx_read_time, published_date, rating, times_read,username) ";
    $query .= "VALUES('Matilda', 'Roald Dahl', 'Classics, Horror',240,'Matilda.jpg',11.3,'1988-6-01',4.29,3,'Isaac') ";

    $insert_data_query = mysqli_query($connection,$query);
    checkquery($insert_data_query);
    
    
?>