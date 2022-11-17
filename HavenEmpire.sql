

CREATE TABLE users(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(60) NOT NULL,
    password VARCHAR(60) NOT NULL,
    fullname VARCHAR(50) NULL,
    email VARCHAR(60) UNIQUE NOT NULL,
    phone VARCHAR(50) UNIQUE NOT NULL,
    PRIMARY KEY (user_id , email, phone)
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
direction varchar (50),
owner_phone varchar (60),
primary key(hostel_id)
);


Create table rooms(
room_id int not null auto_increment,
hostel_id int not null, 
price int not null, 
occupant_num enum("No. of 1 in a room", "No. of 2 in a room", "No. of 3 in a room", "No. of 4 in a room"),
primary key(room_id),
foreign key(hostel_id) references hostels (hostel_id));


CREATE TABLE paid_rooms(
	paid int not null auto_increment, 
	user_id int not null,
    hotel_id int not null, 
    dates DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    primary key (paid));
    




-- insert into rooms (hostel_id, occupant_num) values (1, "4");
-- insert into rooms (hostel_id, occupant_num) values (1, "3");
-- insert into rooms (hostel_id, occupant_num) values (1, "3");
-- insert into rooms (hostel_id, occupant_num) values (1, "3");

insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Colombiana Hostel", "Carlos Adam", "5000-8000", "images/feature-properties/fp-1.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg", "Colombiana.php", "+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Hosana Hostel", "Abigail Akoto", "5000-8000", "images/feature-properties/fp-2.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Masere Hostel", "Chantelle Abgadie", "5000-8000", "images/feature-properties/fp-3.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("New Masere Hostel", "Chantelle Abgadie", "5000-8000", "images/feature-properties/fp-8.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Dufie Hostel", "Georgina Agyei", "5000-8000", "images/feature-properties/fp-9.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg" ,"Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("New Dufie Hostel", "Georgina Agyei", "5000-8000", "images/feature-properties/fp-6.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Queenstar Hostel", "Benjamin Franklin", "5000-8000", "images/feature-properties/fp-7.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Charlotte Hostel", "Charlotte Osei", "5000-8000", "images/feature-properties/fp-4.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg" ,"Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Uniview Hostel", "Carlos Adam", "5000-8000", "images/feature-properties/fp-5.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Ceewus Hostel", "Angela Kafui", "5000-8000", "images/feature-properties/fp-10.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732");
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Lambert Hostel", "Grace Lamptey", "5000-8000", "images/feature-properties/fp-1.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732" );
 
 insert into hostels (hostel_name, hostel_owner, price_range, image, image1, image2, image3, image4, direction, owner_phone) values("Tanko Hostel", "Bright Tanko", "5000-8000", "images/feature-properties/fp-2.jpg",
"images/single-property/s-1.jpg", "images/single-property/s-2.jpg", "images/single-property/s-3.jpg", "images/single-property/s-4.jpg","Colombiana.php","+233 546473732" );
 
 
 
 
-- select count(*) 
-- from rooms where hostel_id =1 and occupant_num = "3"; 
-- insert into rooms(hostel_id, hostel_type)values(1,"Apartment");




