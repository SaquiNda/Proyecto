CREATE TABLE role(
	role_id INT AUTO_INCREMENT,
	role_name VARCHAR(255),
	role_description VARCHAR(255) NULL,
	PRIMARY KEY(role_id)
);

CREATE TABLE user(
	user_id INT AUTO_INCREMENT,
	user_role_id INT DEFAULT 3,
	user_name VARCHAR(255),
	user_lastname VARCHAR(255),
	user_email VARCHAR(255),
	user_picture LONGTEXT,
	user_password VARCHAR(255),
	user_status INT DEFAULT 1,
	PRIMARY KEY(user_id),
	FOREIGN KEY(user_role_id) REFERENCES role(role_id)
);

CREATE TABLE product(
	product_id INT AUTO_INCREMENT,
    product_name varchar(255),
    product_description longtext,
    product_status int default 1,
    product_created_at timestamp default current_timestamp,
    product_price decimal(7,2),
    PRIMARY KEY(product_id)
);

CREATE TABLE gallery(
	gallery_id INT AUTO_INCREMENT,
	gallery_product_id INT NOT NULL,
	gallery_picture LONGTEXT,
	PRIMARY KEY(gallery_id),
	FOREIGN KEY(gallery_product_id) REFERENCES product(product_id)
);

CREATE TABLE stock(
	stock_id INT AUTO_INCREMENT,
	stock_product_id INT NOT NULL,
	stock_qty INT NOT NULL,
	PRIMARY KEY(stock_id),
	FOREIGN KEY(stock_product_id) REFERENCES product(product_id)
);

CREATE TABLE cart(
	cart_id INT AUTO_INCREMENT,
	cart_user_id INT NOT NULL,
	cart_product_id INT,
	PRIMARY KEY(cart_id),
	FOREIGN KEY(cart_user_id) REFERENCES user(user_id),
	FOREIGN KEY(cart_product_id) REFERENCES product(product_id)
);

CREATE TABLE `order`(
	order_id INT AUTO_INCREMENT,
	order_user_id INT NOT NULL,
	order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	order_address VARCHAR(255),
	order_phone VARCHAR(50),
	order_nit VARCHAR(20),
	order_nit_name VARCHAR(50),
	order_amount DECIMAL(7,2),
	order_status INT DEFAULT 1,
	PRIMARY KEY(order_id)
);

CREATE TABLE order_detail(
	order_detail_id INT,
	order_detail_order_id INT,
	order_detail_product_id INT,
	order_qty INT DEFAULT 1,
	PRIMARY KEY(order_detail_id),
	FOREIGN KEY(order_detail_order_id) REFERENCES `order`(order_id),
	FOREIGN KEY(order_detail_product_id) REFERENCES product(product_id)
);

/*CREATE TABLE invoice(
	invoice_id INT AUTO_INCREMENT,
	invoice_
);*/

