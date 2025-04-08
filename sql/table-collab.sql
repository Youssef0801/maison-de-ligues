CREATE TABLE collaborateurs (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255),
  phone VARCHAR(20),
  birthdate DATE,
  city VARCHAR(100),
  country VARCHAR(100),
  photo VARCHAR(255),
  service VARCHAR(100),
  isAdmin BOOLEAN DEFAULT FALSE
);
