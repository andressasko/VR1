CREATE TABLE rsaarmae_zoo (
	id integer PRIMARY KEY auto_increment,
	name varchar(50),
	age integer,
	species varchar(50),
	cage integer
);

INSERT INTO rsaarmae_zoo VALUES 
(NULL, 'Tom', '3', 'Lõvi', 1), 
(NULL, 'Shea', '2', 'Lõvi', 1), 
(NULL, 'Jürka', '8', 'Lõvi', 2), 
(NULL, 'Shrek', '5', 'Eesel', 3), 
(NULL, 'Ott', '9', 'Pruunkaru', 4);


SELECT * FROM rsaarmae_zoo where cage=1 ORDER BY age asc;

SELECT max(age), min(age) FROM rsaarmae_zoo;

SELECT cage, count(*) FROM rsaarmae_zoo GROUP BY cage;

UPDATE rsaarmae_zoo SET age=age+1;