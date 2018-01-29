INSERT INTO artist (id, first_name, last_name)
       VALUES 
       (NULL, 'John', 'Macintosh'), 
       (NULL, 'George', 'Powell'), 
       (NULL, 'Thomas', 'Firr'),
       (NULL, 'Jill', 'Jackson'),
       (NULL, 'Henry', 'Kjaeb'),
       (NULL, 'Yvonne', 'Desirom');

INSERT INTO record_store (identifier, artist_id, title, year, genre, type, price)
       VALUES 
       ('10284', 2, 'Blue Leaves', '1998', 'Hip-Hop', 'CD', '08.00'), 
       ('10286', 1, 'Flying Eagles', '2005', 'Pop', 'DVD', '12.59'), 
       ('10291', 1, 'Smooth Jazz', '2000', 'Jazz', 'Vinyl 12"', '5.99'),
       ('10293', 4, 'Hawks', '2006', 'Country', 'Vinyl 12"', '15.99'),
       ('10305', 6, 'Morning Birds', '1997', 'Country', 'DVD', '9.98'),
       ('10308', 5, 'Wake Wakey', '2010', 'Pop', 'CD', '10.05'),
       ('10350', 3, 'Grasshopper', '1970', 'Jazz', 'Vinyl 9"', '8.99'),
       ('10380', 4, 'Halloween Monsters', '1999', 'Pop', 'DVD', '2.49'),
       ('10423', 4, 'Sunshine', '2004', 'Jazz', 'CD', '10.99');

INSERT INTO customer (id, first_name, last_name, email_address, addressLine1, addressLine2, postCode)
       VALUES
       (NULL, 'Jason', 'Brent', 'jbrent@yahoo.com', '21 Hill Street', 'London', 'NW2 8DS'),
       (NULL, 'Morgan', 'Jefersson', 'mj0422@gmail.com', '42 Jasmine Road', 'Manchester', 'M22 1EP'),
       (NULL, 'Stacey', 'Love', 'j.love225@yahoo.com', '1 Forest Street', 'London', 'SE5 28D'),
       (NULL, 'Pamela', 'Humphrey', 'ph@hotmail.co.uk', '29 Church Hill', 'Liverpool', 'L17 22B'),
       (NULL, 'Anthony', 'Anderson', 'AA@yahoo.co.uk', '10 Palmers Street', 'London', 'E20 4JS'),
       (NULL, 'Jermaine', 'Harrison', 'jHarr@gmail.com', '2 Grunby Road', 'London', 'SE20 3SZ'),
       (NULL, 'Irene', 'Mackerel', 'irene@yahoo.com', '27 Church Hill', 'Liverpool', 'L17 22B'),
       (NULL, 'Dwayne', 'Jackson', 'DwayneJ@gmail.com', '5 Ainsley Road', 'London', 'NW15 3SB');

INSERT INTO transaction (id, customer_id, dateOrdered, deliveryMethod)
       VALUES
       (NULL, 1, '2015-02-02 11:27:25', 'Post'),
       (NULL, 1, '2015-06-11 19:05:02', 'Post'),
       (NULL, 2, '2015-11-11 15:57:32', 'E-mail'),
       (NULL, 2, '2014-09-08 12:35:39', 'Post'),
       (NULL, 3, '2013-12-12 11:05:39', 'E-mail');

INSERT INTO orderInfo (id, transaction_id, record_identifier, quantity)
       VALUES
       (NULL, 1, '10286', 2),
       (NULL, 2, '10423', 2),
       (NULL, 3, '10350', 5),
       (NULL, 1, '10380', 1),
       (NULL, 4, '10286', 2),
       (NULL, 3, '10291', 3),
       (NULL, 5, '10350', 1),
       (NULL, 2, '10293', 9),
       (NULL, 5, '10286', 1);

