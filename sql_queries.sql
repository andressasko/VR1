CREATE TABLE rsaarmae_pictures (
  id integer PRIMARY KEY auto_increment,
  filename varchar(100) NOT NULL,
  width INTEGER,
  height INTEGER,
  title VARCHAR(100),
  author VARCHAR(100),
  points INTEGER
);

INSERT INTO rsaarmae_pictures (filename) VALUES ('test.jpg');

TRUNCATE TABLE rsaarmae_pictures;