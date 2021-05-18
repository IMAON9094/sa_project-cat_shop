CREATE TABLE admin (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR 255 NOT NULL,
    password VARCHAR 255 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE posts (
    post_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    post_species VARCHAR 255 NOT NULL,
    post_catcolor VARCHAR 255 NOT NULL,
    post_eyecolor VARCHAR 255 NOT NULL,
    post_catage VARCHAR 255 NOT NULL,
    post_catsex VARCHAR 255  NOT NULL,
    post_catweight VARCHAR 255 NOT NULL,
    post_price VARCHAR 255 NOT NULL,
    post_image TEXT NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE customer (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE basketorder (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    basket_id INT(10) NOT NULL,
    basket_totalprice VARCHAR (255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*CREATE TABLE vieworder (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    order_id INT(10) NOT NULL,
    order_species VARCHAR (255) NOT NULL,
    order_catcolor VARCHAR (255) NOT NULL,
    order_eyecolor VARCHAR (255) NOT NULL,
    order_catage VARCHAR (255) NOT NULL,
    order_catsex VARCHAR (255)  NOT NULL,
    order_catweight VARCHAR (255) NOT NULL,
    order_price VARCHAR (255) NOT NULL,
    order_image TEXT NOT NULL,
    name_customer VARCHAR (255) NOT NULL,
    shipment VARCHAR (255) NOT NULL,
    slip_image TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;*/

CREATE TABLE vieworder (
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    basket_id INT(10) NOT NULL,
    basket_totalprice VARCHAR (255) NOT NULL,
    name_customer VARCHAR (255) NOT NULL,
    shipment VARCHAR (255) NOT NULL,
    slip_image TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;