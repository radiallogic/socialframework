
CREATE TABLE IF NOT EXISTS users
(
    id INT NOT NULL AUTO_INCREMENT,
    fbid INT NOT NULL,
    promoter ENUM('no', 'yes'), 
    PRIMARY KEY (id),
    UNIQUE (fbid)
)
ENGINE=InnoDB;