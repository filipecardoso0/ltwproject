/* SQLITE "SETTINGS" */
.mode columns
.headers on
PRAGMA foreign_keys=ON;

DROP TABLE IF EXISTS User; 
DROP TABLE IF EXISTS Restaurant; 
DROP TABLE IF EXISTS FavouriteDish;
DROP TABLE IF EXISTS FavouriteRestaurant;
DROP TABLE IF EXISTS Owner;
DROP TABLE IF EXISTS Orders; 
DROP TABLE IF EXISTS Review; 
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Customer; 
DROP TABLE IF EXISTS Category;

CREATE TABLE User(
    IdUser INTEGER, 
    Name TEXT CONSTRAINT nn_User_Name NOT NULL,
    Password TEXT CONSTRAINT nn_User_Password NOT NULL, 
    Username TEXT CONSTRAINT nn_User_Username NOT NULL, 
    Address TEXT CONSTRAINT nn_User_Address NOT NULL, 
    Phonenumber INTEGER CONSTRAINT nn_User_Phonenumber NOT NULL,
    CONSTRAINT UserPrimaryKeyDefinition PRIMARY KEY(IdUser)
); 

CREATE TABLE FavouriteDish(
    IdFavouriteDish INTEGER PRIMARY KEY,
    IdUser INTEGER, 
    IdDish INTEGER,
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
    CONSTRAINT idDishForeignKey FOREIGN KEY (IdDish) REFERENCES Dish
);

CREATE TABLE FavouriteRestaurant(
      IdFavouriteRestaurant INTEGER PRIMARY KEY,
      IdUser INTEGER,
      IdRestaurant INTEGER,
      CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
      CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Dish
);

CREATE TABLE Orders(
    IdOrders INTEGER, 
    IdRestaurant INTEGER, 
    IdCustomer INTEGER,
    IdDish INTEGER,
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdCustomer) REFERENCES Customer,
    CONSTRAINT IdDishForeignKey FOREIGN KEY (IdDish) REFERENCES Dish,
    CONSTRAINT IdOrdersPrimaryKeyDefinition PRIMARY KEY (IdOrders)
); 


CREATE TABLE Customer(
    IdUser INTEGER,
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
    CONSTRAINT CustomerPrimaryKeyDefinition PRIMARY KEY(IdUser)
);


CREATE TABLE Restaurant(
    IdRestaurant INTEGER PRIMARY KEY,
    IdOwner INTEGER,
    IdCategory INTEGER,
    name text not null,
    address text not null,
    avg_review INTEGER,
    CONSTRAINT IdRestaurantOwnerForeignKey FOREIGN KEY (IdOwner) REFERENCES Owner,
    CONSTRAINT IdCategoryForeignKey FOREIGN KEY (IdCategory) REFERENCES Category,
    check(avg_review >= 0 & avg_review <= 5)
); 

CREATE TABLE Owner(
    IdUser INTEGER, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
    CONSTRAINT CustomerPrimaryKeyDefinition PRIMARY KEY(IdUser)
);

CREATE TABLE Dish(
    IdDish INTEGER PRIMARY KEY,
    Name TEXT not null,
    Price INTEGER not null,
    Category TEXT not null,
    IdImage INTEGER not null,
    IdRestaurant INTEGER, 
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant
);


CREATE TABLE Review(
    IdReview INTEGER,
    Content TEXT CONSTRAINT nn_Review_Content NOT NULL, 
    Rating INT CONSTRAINT nn_Review_RATING NOT NULL, 
    IdRestaurant INTEGER, 
    IdUser INTEGER, 
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User, 
    CONSTRAINT IdReviewPrimaryKeyDefinition PRIMARY KEY (IdReview)
); 

CREATE TABLE Category(
   IdCategory INTEGER,
   CategoryTitle TEXT CONSTRAINT nn_CategoryTitle NOT NULL,
   CONSTRAINT IdCategoryPKDefinition PRIMARY KEY(IdCategory)
);

CREATE TABLE RestaurantImage(
    IdImage Integer,
    IdRestaurant Integer,
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant ON DELETE CASCADE,
    CONSTRAINT RestaurantImagePKDefinition PRIMARY KEY(IdImage)
);

/* DEFAULT CATEGORY VALUES */
INSERT INTO Category VALUES(1, "FastFood");
INSERT INTO Category VALUES(2, "Portuguese");
INSERT INTO Category VALUES(3, "Mediterranean cuisine");
INSERT INTO Category VALUES(4, "Brazilian");