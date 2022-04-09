Create table publishers
(
  publisherId int not null primary key auto_increment,
  publisherName varchar(100) not null
);

Create table books
(	
   publisherId int not null,
   bookId int not null primary key auto_increment,
   bookName varchar(100) not null,
   authorName varchar(100) not null,
   bookPrice int not null,
    foreign key (publisherId) references publishers(publisherId)
);

select * from publishers;

select * from books;
