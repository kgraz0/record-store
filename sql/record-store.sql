SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS record_store, artist, customer, transaction, orderInfo;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE artist (
id INT AUTO_INCREMENT,
first_name VARCHAR(50),
last_name VARCHAR(50),
PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE record_store (
identifier VARCHAR(5),
artist_id INT,
title VARCHAR(20),
year YEAR(4),
genre VARCHAR(10),
type VARCHAR(10),
price DECIMAL(10, 2) unsigned, 
PRIMARY KEY (identifier),
FOREIGN KEY (artist_id) 
        REFERENCES artist (id) 
) ENGINE=InnoDB;

CREATE TABLE customer (
id INT AUTO_INCREMENT,
first_name VARCHAR(50),
last_name VARCHAR(50),
email_address VARCHAR(50),
addressLine1 VARCHAR(50),
addressLine2 VARCHAR(50),
postCode VARCHAR(10),
PRIMARY KEY(id)
) ENGINE=InnoDB;

CREATE TABLE transaction (
id INT AUTO_INCREMENT,
customer_id INT,
dateOrdered DATETIME,
deliveryMethod VARCHAR(20),
PRIMARY KEY (id),
FOREIGN KEY (customer_id)
        REFERENCES customer (id)
) ENGINE=InnoDB;

CREATE TABLE orderInfo (
id INT AUTO_INCREMENT,
transaction_id INT,
record_identifier VARCHAR(5),
quantity INT,
PRIMARY KEY(id),
FOREIGN KEY (transaction_id)
        REFERENCES transaction(id),
FOREIGN KEY (record_identifier)
        REFERENCES record_store(identifier)
) ENGINE=InnoDB;

