USE timeless_boutiques;

/*
*IMPOTANT - PLEASE RUN THE ALTER COMMAND BEFORE RUNNING THE WEBSITE
*/

INSERT INTO categories (id, name, description)
VALUES (1, 'Timeless Bouquets', ''),
       (2, 'Everafter Bouquets', ''),
       (3, 'Enchanted Prom Corsage', ''),
       (4, 'Eternelle Bloom Boutonniere', '');

SELECT * FROM products;
SELECT * FROM categories;

INSERT INTO products (id, category_id, name, description, price, quantity) 
VALUES 
(1, 1, 'Timeless Small Bouquet', 'PLACEHOLDER DESCRIPTION.', 29.99, 1),
(2, 1, 'Timeless Medium Bouquet', 'PLACEHOLDER DESCRIPTION.', 39.99, 1),
(3, 1, 'Timeless Large Bouquet', 'PLACEHOLDER DESCRIPTION.', 49.99, 1);

INSERT INTO products (id, category_id, name, description, price, quantity) 
VALUES 
(4, 2, 'Everafter Small Bouquet', 'PLACEHOLDER DESCRIPTION.', 29.99, 1),
(5, 2, 'Everafter Medium Bouquet', 'PLACEHOLDER DESCRIPTION.', 39.99, 1),
(6, 2, 'Everafter Large Bouquet', 'PLACEHOLDER DESCRIPTION.', 49.99, 1);


INSERT INTO products (id, category_id, name, description, price, quantity) 
VALUES 
(7, 3, '1 Enchanted Prom Corsage', 'PLACEHOLDER DESCRIPTION.', 29.99, 1),
(8, 3, '2 Enchanted Prom Corsage', 'PLACEHOLDER DESCRIPTION.', 39.99, 1),
(9, 3, '3 Enchanted Prom Corsage', 'PLACEHOLDER DESCRIPTION.', 49.99, 1);



INSERT INTO products (id, category_id, name, description, price, quantity) 
VALUES 
(10, 4, '1 Eternelle Bloom Boutonniere', 'PLACEHOLDER DESCRIPTION.', 29.99, 1),
(11, 4, '2 Eternelle Bloom Boutonniere', 'PLACEHOLDER DESCRIPTION.', 39.99, 1),
(12, 4, '3 Eternelle Bloom Boutonniere', 'PLACEHOLDER DESCRIPTION.', 49.99, 1);

UPDATE products
SET description ='The Three Flowers Éternelle Bloom Boutonnière is a striking option featuring three faux silk roses arranged neatly and secured with satin ribbon in either red, pink, sage green, or ivory. Customers can choose of the three different rose colors, making it a bold and personalized addition to their prom or wedding attire.  The result of the order is exactly like the picture with the chosen color of ribbon by the customer. '
WHERE id = 12 AND category_id = 4;
