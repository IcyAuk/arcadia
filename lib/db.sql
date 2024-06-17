--FINAL ARCADIA

--@block
-- RUN THIS BLOCK AS ROOT FIRST
-- GET RID OF COMMENTS IF NEEDED
CREATE DATABASE IF NOT EXISTS arcadia_zoo;
USE arcadia_zoo;
CREATE USER 'arcadia_zoo_machine'@localhost IDENTIFIED BY '1234'; --machine is the web app
GRANT SELECT, INSERT, UPDATE, DELETE ON arcadia_zoo.* TO 'arcadia_zoo_machine'@localhost;

--@block
-- USERS TABLE
CREATE TABLE visitors(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255)
);

CREATE TABLE staff(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM("mod","vet","admin") NOT NULL
);


--COMMENTS / CONTACT FORMS
CREATE TABLE comments(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    visitor_id INT NOT NULL,
    visitor_username VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    comment TEXT NOT NULL,
    status ENUM("pending","validated")
    FOREIGN KEY (visitor_id) REFERENCES visitors(id),
    FOREIGN KEY (visitor_username) REFERENCES visitors(username)
);

CREATE TABLE contacts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
);

--ANIMALS / HABITATS

CREATE TABLE habitats(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    imagePath TEXT NOT NULL,
);

CREATE TABLE animals(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    habitat_id INT NULL, --si l'animal n'a pas encore d'habitat
    name VARCHAR(255) NOT NULL,
    species VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    imagePath TEXT,
    FOREIGN KEY (habitat_id) REFERENCES habitats(id)
);

CREATE TABLE AnimalDietLog(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    animal_id INT NOT NULL,
    food VARCHAR(255) NOT NULL,
    food_kilogram INT,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE
);

CREATE TABLE AnimalVetLog(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    vet_id INT NOT NULL,
    animal_id INT NOT NULL,
    proposed_food VARCHAR(255),
    proposed_food_kilogram INT,
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    detail TEXT NULL,
    FOREIGN KEY (vet_id) REFERENCES staff(id),
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE
);

CREATE TABLE animalImpressionCounter(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    animal_id INT NOT NULL,
    counter BIGINT DEFAULT 0,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE
);

--HORAIRES

CREATE TABLE schedule(
    int INT PRIMARY KEY AUTO_INCREMENT,
    day ENUM("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche"),
    ouverture TIME,
    fermeture TIME,
    is_closed TINYINT(1) DEFAULT 0,
    UNIQUE KEY unique_day (day) --prevent duplicated days
);

-- SERVICES
CREATE TABLE services(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    imagePath TEXT NOT NULL,
);
