# css326

INSERT INTO `client` (`Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`,  `Occoupation`, `PhoneNumber`) VALUES ('leon', 'leon@email.com', 'Male', '2000-06-26', 'Leon', 'Wirz', '88/218 bangbuathong', 'Student', '0824345775') 

INSERT INTO `driver` ( `Password`, `Email`, `Gender`, `DateOfBirth`, `FName`, `LName`, `Address`, `DriverLicenseID`, `PhoneNumber`, `Rating`) VALUES ( 'knot', 'knot@email.com', 'Male', '2001-04-20', 'Asipan', 'Ketphet', 'Chonburi', '1234567890010444', '0800168998', '0') 

INSERT INTO `restaurant` ( `Name`, `Location`, `PhoneNumner`, `Type`, `Opening_Times`, `Opening_Days`, `Rating`, `Email`, `Password`) VALUES ( 'Junior\' Chicken', 'Chiangmai', '08696969420', 'Fastfood', '00:00 - 00:00', 'Everyday','0', 'junior@email.com', 'junior') 

INSERT INTO `foodordering` ( `ClientID`,  `Accepting_TimeStamp`, `Arrival_TimeStamp`, `Departure_TimeStamp`, `AcceptingAddress`, `DestinationAddress`, `RideDuration`, `Status`) VALUES ('1', '2021-11-12 21:17:00.69', '2021-11-12 21:17:00.69', '2021-11-12 21:17:00.69', 'Bangkok', 'Nonthaburi', '1.5hrs', 'Looking For Driver');

SELECT * FROM `foodordering` WHERE `foodordering`.`Status` = 'Looking for Driver';

SELECT *
                        FROM `client`,`driver`,`restaurant`,`foodordering`,`foodpayment`,`menuiteminrestaurant`,`ordereditem` 
                        WHERE `driver`.`DriverID` = $id
                        AND `foodordering`.`DriverID` = `driver`.`DriverID`
                        AND `foodordering`.`ClientID` = `client`.`ClientID`
                        AND `foodordering`.`FoodOrderingID` = `foodpayment`.`FoodOrderingID`
                        AND `foodordering`.`FoodOrderingID` = `ordereditem`.`FoodOrderingID`
                        AND `ordereditem`.`MenuItemInRestaurantID` = `MenuItemInRestaurant`.`MenuItemInRestaurantID`
                        AND `MenuItemInRestaurant`.`RestaurantID` = `Restaurant`.`RestaurantID`


SELECT * FROM `foodordering`, `driver`, `orderitem` WHERE `foodordering`.`Status` = 'Picking up Food';"