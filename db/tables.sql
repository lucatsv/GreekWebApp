CREATE TABLE users
(
    userId int NOT NULL,
    FirstName varchar(255),
    LastName varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    Address varchar(255),
    Province varchar(255),
    Zipcode varchar(255),
    phoneNumber varchar(255),
    City varchar(255),
    Password varchar(255),
    PRIMARY KEY (userId)
);

insert into users values(1, 'Lucas', 'Vieira','lucas@lucas.com', 'somewhere','BC', 'XCVVCX','6047246861','Burnaby','1234');
insert into users values(2, 'Sonali', 'Paul','sonali@sonali.com', 'somewhere','BC', 'XCVVCX','6047246862','Burnaby','4321');

CREATE TABLE categories
(
    categoryId integer NOT NULL,
    categoryName varchar(255) NOT NULL,
    
    CONSTRAINT pk_categoryId PRIMARY KEY(categoryId)
    
)

insert into categories values (1,'Lunch');
insert into categories values (2,'Dinner');
insert into categories values (3,'Beverages');
insert into categories values (4,'Side dishes');
insert into categories values (5,'Deserts');

CREATE TABLE dishes
(
    dishId integer NOT NULL,
    dishName varchar(255) NOT NULL,
    categoryId integer NOT NULL,
    --categoryName varchar(255) NOT NULL,
    price  numeric(15,2) NOT NULL,
    quantity integer NOT NULL,
    imgAddress varchar(255), 
    
    CONSTRAINT pk_dishId PRIMARY KEY(dishId),
    CONSTRAINT fk_categoryId FOREIGN KEY(categoryId) REFERENCES categories(categoryId)
    
)

insert into dishes values(1,'Baklava',5,2.00,10,'img/img-desserts/baklava-150x150.jpg');
insert into dishes values(2,'Galakto Boureko',5,2.50,15,'img/img-desserts/galaktoboureko-150x150.jpg');
insert into dishes values(3,'Cheese Cake',5,3.00,15,'img/img-desserts/greek-yougurt-cheesecake-150x150.jpg');
insert into dishes values(4,'Kataifi',5,2.00,15,'img/img-desserts/kataifi-150x150.jpg');

insert into dishes values(5,'Gyros',2,5.00,15,'img/img-dishes/dinner/gyros-150x150.jpg');
insert into dishes values(6,'Pastitsio',2,5.50,25,'img/img-dishes/dinner/pastitsio-150x150.jpg');
insert into dishes values(7,'Souvlaki',2,7.50,25,'img/img-dishes/dinner/souvlaki-150x150.jpg');

insert into dishes values(8,'Fish',1,5.50,25,'img/img-dishes/lunch/fish-150x150.jpg');
insert into dishes values(9,'Spanakopita',1,8.00,25,'img/img-dishes/lunch/spanakopita-150x150.jpg');
insert into dishes values(10,'Turkey Pita',1,4.50,5,'img/img-dishes/lunch/turkey-pita-150x150.jpg');

insert into dishes values(11,'7 Up',3,1.50,25,'img/img-drinks/7up-150x150.jpg');
insert into dishes values(12,'Coke',3,1.50,25,'img/img-drinks/coke-150x150.jpg');
insert into dishes values(13,'Retsina',3,2.50,25,'img/img-drinks/retsina-150x150.jpg');
insert into dishes values(14,'Tea',3,1.50,25,'img/img-drinks/tea-150x150.jpg');

insert into dishes values(15,'Greek Salada',4,3.50,25,'img/img-drinks/greek-salad-150x150.jpg');
insert into dishes values(16,'Lemon Potatos',4,4.50,25,'img/img-drinks/lemon-potatos-150x150.jpg');
insert into dishes values(17,'Pasta Salad',4,6.50,25,'img/img-drinks/pasta-salad-150x150.jpg');
insert into dishes values(18,'Pita Tzatziki',4,4.50,25,'img/img-drinks/pita-taztziki-150x150.jpg');


CREATE TABLE ingredients
(
    ingredientID integer NOT NULL,
    ingredientName varchar(255) NOT NULL,
    dishId integer NOT NULL,
    CONSTRAINT pk_ingredientID PRIMARY KEY(ingredientID),
    CONSTRAINT fk_dishId FOREIGN KEY (dishId) REFERENCES Dishes(dishId)
);


CREATE TABLE invoices
(
    invoiceId integer not null,
    userId integer not null,
    dishId integer not null,
    quantity integer not null,
    CONSTRAINT fk_userId_invoices FOREIGN KEY (userId) REFERENCES Users(userId),
    CONSTRAINT fk_dishId_invoices FOREIGN KEY (dishId) REFERENCES Dishes(dishId),
    CONSTRAINT pk_invoiceId PRIMARY KEY(invoiceId)
);

insert into invoices values(1,1,1,2);
insert into invoices values(2,1,2,3);
insert into invoices values(3,1,3,2);
insert into invoices values(4,1,4,5);
insert into invoices values(5,2,5,4);
insert into invoices values(6,2,6,1);
insert into invoices values(7,2,7,3);
insert into invoices values(8,2,8,1);


CREATE TABLE recommendations
(
    dishId_A integer not null,
    dishId_B integer not null,
    CONSTRAINT fk_dishId_A_RECOMMENDATIONS FOREIGN KEY (dishId_A) REFERENCES Dishes(dishId),
    CONSTRAINT fk_dishId_B_RECOMMENDATIONS FOREIGN KEY (dishId_B) REFERENCES Dishes(dishId),
    CONSTRAINT pk_recommendations PRIMARY KEY(dishId_A, dishId_B)    
)

insert into recommendations values(1,5);
insert into recommendations values(1,2);
insert into recommendations values(1,3);
insert into recommendations values(1,4);
insert into recommendations values(2,3);
insert into recommendations values(9,7);
insert into recommendations values(2,8);
insert into recommendations values(7,9);
insert into recommendations values(6,15);
insert into recommendations values(5,12);
insert into recommendations values(4,13);
insert into recommendations values(3,7);
insert into recommendations values(1,18);
insert into recommendations values(2,5);

