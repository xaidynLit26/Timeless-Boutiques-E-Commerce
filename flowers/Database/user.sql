USE timeless_boutiques;

INSERT INTO users (id, fname, lname, email, password, address, city, state, zip_code, phone) 
VALUES 
(1, 'John', 'Smith', 'johnsmith@gmail.com', '123', '15 East 40th Street', 'Bayonne', 'New Jersey', '07002', '123-456-7890');
SELECT * FROM users WHERE email = 'johnsmith@gmail.com';

SELECT*FROM users;