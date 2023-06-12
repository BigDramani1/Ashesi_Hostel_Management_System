drop database if exists havenempire;
create database havenempire;
use havenempire; 
CREATE TABLE users(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    full_name VARCHAR(50) NULL,
    email VARCHAR(60) UNIQUE NOT NULL,
    phone VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE hostels(
hostel_id int not null auto_increment, 
hostel_name varchar(60),
hostel_owner varchar (60),
price_range varchar (60),
image VARCHAR(255),
image1 VARCHAR(255),
image2 VARCHAR(255),
image3 VARCHAR(255),
image4 VARCHAR(255), 
owner_phone varchar (60),
primary key(hostel_id)
);


Create table rooms(
room_id int not null auto_increment,
hostel_id int not null, 
price int not null, 
primary key(room_id),
foreign key(hostel_id) references hostels (hostel_id));


create table cart(
    cart_id int not null auto_increment,
    hostel_id int(11) NOT NULL,
  user_id int not null,
  qty int (11) NOT NULL,
  room_num varchar(25) not null, 
  price float not null,
  primary key(cart_id),
  foreign key (user_id) references users (user_id));

CREATE TABLE paid_rooms(
	paid int not null auto_increment, 
	user_id int not null,
    hotel_id int not null, 
    dates DATETIME NOT NULL,
    primary key (paid));
    
create table receipt(
    receipt_id int not null auto_increment,
    hostel_id int(11) NOT NULL,
  user_id int not null,
  qty int (11) NOT NULL,
  room_num varchar(25) not null, 
  invoice_num int (11) not null, 
  order_date date not null,
  total float(11) not null,
  price float(11) not null,
  primary key(receipt_id),
  foreign key (user_id) references users (user_id));

  create table admin_receipt(
    admin_receipt_id int not null auto_increment,
    hostel_id int(11) NOT NULL,
  user_id int not null,
  qty int (11) NOT NULL,
  room_num varchar(25) not null, 
  invoice_num int (11) not null, 
  order_date date not null,
  total  float (11) not null,
  price float(11) not null,
  primary key(admin_receipt_id),
  foreign key (user_id) references users (user_id));



insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Colombiana Hostel", "Carlos Adam", "5000-8000", "images/feature-properties/fp-1.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg",  "+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Hosana Hostel", "Abigail Akoto", "5000-8000", "images/feature-properties/fp-2.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Masere Hostel", "Chantelle Abgadie", "5000-8000", "images/feature-properties/fp-3.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("New Masere Hostel", "Chantelle Abgadie", "5000-8000", "images/feature-properties/fp-8.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Dufie Hostel", "Georgina Agyei", "5000-8000", "images/feature-properties/fp-9.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg" ,"+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("New Dufie Hostel", "Georgina Agyei", "5000-8000", "images/feature-properties/fp-6.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Queenstar Hostel", "Benjamin Franklin", "5000-8000", "images/feature-properties/fp-7.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Charlotte Hostel", "Charlotte Osei", "5000-8000", "images/feature-properties/fp-4.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg" ,"+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Uniview Hostel", "Carlos Adam", "5000-8000", "images/feature-properties/fp-5.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Ceewus Hostel", "Angela Kafui", "5000-8000", "images/feature-properties/fp-10.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Lambert Hostel", "Grace Lamptey", "5000-8000", "images/feature-properties/fp-1.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4,  owner_phone) values("Tanko Hostel", "Bright Tanko", "5000-8000", "images/feature-properties/fp-2.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","+233 546473732" );




