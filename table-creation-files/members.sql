/*
  Melanie Felton
  Bessy Torres-Miller
  Query to create cat_members table in database
*/

--- Table structure for table `members`--

    CREATE TABLE cat_members (
        username varchar(10) NOT NULL PRIMARY KEY,
        password varchar(40) NOT NULL,
        access TINYINT(4) DEFAULT '0'
        )
        ENGINE=InnoDB DEFAULT CHARSET=latin1;

--- Default Users ---

    INSERT INTO cat_members (username,password,access)
        VALUES
        ('tinao',sha1('changeNow'),'2'),
        ('melf',sha1('changeNow'),'2'),
        ('best',sha1('changeNow'),'2'),
        ('catlover',sha1('changeNow'),'0');

