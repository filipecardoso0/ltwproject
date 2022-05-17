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
DROP TABLE IF EXISTS Dishes; 
DROP TABLE IF EXISTS Customer; 


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
    IdDishes INTEGER, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
    CONSTRAINT idDishForeignKey FOREIGN KEY (IdDishes) REFERENCES Dishes
);

CREATE TABLE FavouriteRestaurant(
      IdFavouriteRestaurant INTEGER PRIMARY KEY,
      IdUser INTEGER,
      IdRestaurant INTEGER,
      CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
      CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Dishes
);

CREATE TABLE Orders(
    IdOrders INTEGER, 
    IdRestaurant INTEGER, 
    IdUser INTEGER, 
    IdDishes INTEGER, 
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User, 
    CONSTRAINT IdDishesForeignKey FOREIGN KEY (IdDishes) REFERENCES Dishes, 
    CONSTRAINT IdOrdersPrimaryKeyDefinition PRIMARY KEY (IdOrders)
); 


CREATE TABLE Customer(
    IdUser INTEGER,
    IdOrders INTEGER,
    CONSTRAINT IdOrdersForeignKey FOREIGN KEY (IdOrders) REFERENCES Orders, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User, 
    CONSTRAINT CustomerPrimaryKeyDefinition PRIMARY KEY(IdUser)
);


CREATE TABLE Restaurant(
    IdRestaurant INTEGER PRIMARY KEY,
    IdOrders INTEGER, 
    IdDishes INTEGER, 
    name text not null,
    address text not null,
    avg_review INTEGER,
    CONSTRAINT IdOrdersForeignKey FOREIGN KEY (IdOrders) REFERENCES Orders,
    CONSTRAINT IdDishesForeignKey FOREIGN KEY (IdDishes) REFERENCES Dishes,
    check(avg_review >= 0 & avg_review <= 5)
); 

CREATE TABLE Owner(
    IdUser INTEGER, 
    IdRestaurant INTEGER, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User,
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant,
    CONSTRAINT CustomerPrimaryKeyDefinition PRIMARY KEY(IdUser)
);

CREATE TABLE Dishes(
    IdDishes INTEGER PRIMARY KEY,
    Name TEXT not null,
    Price INTEGER not null,
    Category TEXT not null,
    Photo TEXT not null,
    IdRestaurant INTEGER, 
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant
);


CREATE TABLE Review(
    idReview INTEGER, 
    Content TEXT CONSTRAINT nn_Review_Content NOT NULL, 
    Rating INT CONSTRAINT nn_Review_RATING NOT NULL, 
    IdRestaurant INTEGER, 
    IdUser INTEGER, 
    CONSTRAINT IdRestaurantForeignKey FOREIGN KEY (IdRestaurant) REFERENCES Restaurant, 
    CONSTRAINT IdUserForeignKey FOREIGN KEY (IdUser) REFERENCES User, 
    CONSTRAINT idReviewPrimaryKeyDefinition PRIMARY KEY (idReview) 
); 
