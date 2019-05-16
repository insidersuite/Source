ALTER TABLE `accomodation` 
ADD COLUMN `min_capacity` VARCHAR(45) NULL AFTER `timestamp`;
ALTER TABLE `accomodation` 
ADD COLUMN `min_day_booking` VARCHAR(45) NULL AFTER `min_capacity`;
