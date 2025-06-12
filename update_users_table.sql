USE uni_pro;

ALTER TABLE users
ADD COLUMN lastname VARCHAR(100) AFTER name,
ADD COLUMN display_name VARCHAR(100) AFTER lastname; 