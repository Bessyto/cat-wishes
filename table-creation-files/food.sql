/*  Melanie Felton
    Bessy Torres-Miller
    Query to create food table in database
*/

CREATE TABLE food (
    id INT(3) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    description VARCHAR(200) NOT NULL,
    recommendation INT(4) NOT NULL,
    image VARCHAR(200)
);