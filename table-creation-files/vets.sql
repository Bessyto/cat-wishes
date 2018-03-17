/*
  Melanie Felton
  Bessy Torres-Miller
  Query to create vets table in database
*/

CREATE TABLE vets (
    id INT(3) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL,
    recommendation INT(4) NOT NULL,
    );