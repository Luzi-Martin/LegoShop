﻿/*CREATE TABLE user
(
  id INT
  UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR
  (64)  NOT NULL,
  lastName  VARCHAR
  (64)  NOT NULL,
  email     VARCHAR
  (128) NOT NULL,
  password  VARCHAR
  (255)  NOT NULL,
  PRIMARY KEY
  (id)
);

  INSERT INTO user
    (firstName, lastName, email, password)
  VALUES
    ('Ramon', 'Binz', 'ramon.binz@bbcag.ch', sha2('ramon', 256));
  INSERT INTO user
    (firstName, lastName, email, password)
  VALUES
    ('Samuel', 'Wicky', 'samuel.wicky@bbcag.ch', sha2('samuel', 256));

  /*****/
  /*
  ALTER TABLE user ADD COLUMN admin Boolean;
  ALTER TABLE user ADD COLUMN street varchar
  (64);
  ALTER TABLE user ADD COLUMN house_nr int;


  Create Table Locations
  (
    id int(10)
    auto_increment primary Key,
plz int,
name varchar
    (64)
)

    ALTER TABLE user 
    ADD CONSTRAINT fk_user_location
    FOREIGN KEY (location_id)
    REFERENCES locations(id);

    CREATE TABLE product
    (
      id int(10)
      unsigned NOT NULL PRIMARY Key AUTO_INCREMENT, price float not Null, name varchar
      (64) not NUll, description text )
*/