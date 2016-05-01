-- noinspection SqlDialectInspectionForFile
-- noinspection SqlNoDataSourceInspectionForFile

CREATE TABLE rsaarmae_pictures (
	id integer PRIMARY KEY auto_increment,
	thumb varchar(50) NOT NULL,
	picture varchar(50) NOT NULL,
	caption varchar(50),
	author varchar(50),
	points integer
);

INSERT INTO rsaarmae_pictures VALUES 
(NULL, 'pic1', 'pic1', '1. pilt', 'Madis', 2), 
(NULL, 'pic2', 'pic2', '2. pilt', 'Kalle',RAND()*100), 
(NULL, 'pic3', 'pic3', '3. pilt', 'Mati', RAND()*100), 
(NULL, 'pic4', 'pic4', '4. pilt', 'Kuldar', RAND()*100), 
(NULL, 'pic5', 'pic5', '5. pilt', 'Pille', RAND()*100), 
(NULL, 'pic6', 'pic6', '6. pilt', 'Mati', RAND()*100), 
(NULL, 'pic7', 'pic7', '7. pilt', 'Kalle', RAND()*100), 
(NULL, 'pic8', 'pic8', '8. pilt', 'Mati', RAND()*100), 
(NULL, 'pic9', 'pic9', '9. pilt', 'Peeter', RAND()*100), 
(NULL, 'pic10', 'pic10', '10. pilt', 'Mati', RAND()*100), 
(NULL, 'pic11', 'pic11', '11. pilt', 'Kalle', RAND()*100), 
(NULL, 'pic12', 'pic12', '12. pilt', 'Kalle', RAND()*100), 
(NULL, 'pic13', 'pic13', '13. pilt', 'Kati', RAND()*100);

SELECT * FROM rsaarmae_pictures where points>50 ORDER BY points desc;

SELECT * FROM rsaarmae_pictures where author='Mati';

UPDATE rsaarmae_pictures SET points=points+3;

SELECT author, count(*) as pics FROM rsaarmae_pictures GROUP BY author;

SELECT SUM(points) as punktide_summa from rsaarmae_pictures;