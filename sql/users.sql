
CREATE TABLE IF NOT EXISTS users
(
    id INT NOT NULL AUTO_INCREMENT,
    fbid INT NOT NULL,
    `attitude` VARCHAR(1024)
    `into` VARCHAR(1024),
    `ability` VARCHAR(0124),
    PRIMARY KEY (id),
    UNIQUE (fbid)
)
ENGINE=InnoDB;