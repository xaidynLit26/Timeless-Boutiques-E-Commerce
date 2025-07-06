<!--This starts the session-->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "db_connection.php";
//--This simulates a database similar to what we have but in an array form-->
$products = array();
//This checks to see if anything was passed into the search product engine on
//on the index page. 
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = trim($_GET['query']);
    //This creates an array with all the prducts and their properties from our
    //company. 
    $all_products = array(
        array('id' => 1, 'name' => 'Timeless Small Bouquet', 'price' => 29.99, 'url' => 'bouquets.php', 'description' => 'The Timeless Small Bouquet features six premium faux silk roses carefully arranged with flexible plastic stems for durability. Each bouquet is wrapped in elegant floral wrapping paper and tied with a satin ribbon in either red, pink, sage green, or ivory. Customers can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer.', 'picture' => '/images/smallBoq.jpg'),
        array('id' => 2, 'name' => 'Timeless Medium Bouquet', 'price' => 39.99, 'url' => 'bouquets.php', 'description' => 'The Timeless Medium Bouquet includes nineteen faux silk roses handcrafted with sturdy stems and secured using quality hot glue. Wrapped in luxurious floral wrapping paper and tied with a satin ribbon in either red, pink, sage green, or ivory. This bouquet offers a fuller, elegant appearance. Customers can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/mediumBoq.jpg'),
        array('id' => 3, 'name' => 'Timeless Large Bouquet', 'price' => 49.99, 'url' => 'bouquets.php', 'description' => 'The Timeless Large Bouquet showcases fourty-one beautiful faux silk roses, assembled with flexible plastic stems and reinforced for lasting structure. Each arrangement is wrapped in premium floral wrapping paper and accented with a satin ribbon in either red, pink, sage green, or ivory. Customers can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ','picture' => '/images/largeBoq.jpg' ),
        array('id' => 4, 'name' => 'Classic Small Bouque', 'price' => 29.99, 'url' => 'bouquets.php', 'description' => 'A charming small bouquet featuring traditional roses with classic greenery accents.', 'picture' => '/images/mediumBoq.jpg'),
        array('id' => 10, 'name' => '1 Eternelle Bloom Boutonniere', 'price' => 29.99, 'url' => 'boutonniere.php', 'description' => 'The Single Flower Éternelle Bloom Boutonnière features one faux silk rose, mounted securely on a flexible plastic stem and finished with satin ribbon in either red, pink, sage green, or ivory. Customers can customize their boutonnière by choosing the perfect rose color to match their formalwear.  The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/oneBoot.jpg'),
        array('id' => 11, 'name' => '2 Eternelle Bloom Boutonniere', 'price' => 39.99, 'url' => 'boutonniere.php', 'description' => 'The Two Flowers Éternelle Bloom Boutonnière offers a classic design featuring two faux silk roses tied together with satin ribbon in either red, pink, sage green, or ivory for a polished look. Customers can personalize their boutonnière by selecting of these different rose colors, creating a unique and coordinated accessory. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/twoBoot.jpg'),
        array('id' => 12, 'name' => '3 Eternelle Bloom Boutonniere', 'price' => 49.99, 'url' => 'boutonniere.php', 'description' => 'The Three Flowers Éternelle Bloom Boutonnière is a striking option featuring three faux silk roses arranged neatly and secured with satin ribbon in either red, pink, sage green, or ivory. Customers can choose of the three different rose colors, making it a bold and personalized addition to their prom or wedding attire.  The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/threeBoot.jpg'),
        array('id' => 19, 'name' => 'Everafter Small Bouquet', 'price' => 29.99, 'url' => 'bridal.php', 'description' => 'The Ever After Small Bouquet is designed for intimate weddings and features seven faux silk roses arranged with flexible stems and wrapped in soft ivory or sage green floral paper. Finished with a flowing satin ribbon in either red, pink, sage green, or ivory. This bouquet offers a classic yet customizable option. Brides can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/smallWed.jpg'),
        array('id' => 20, 'name' => 'Everafter Medium Bouquet', 'price' => 39.99, 'url' => 'bridal.php', 'description' => 'The Ever After Medium Bouquet is a stunning choice for brides who want a fuller look, featuring fourteen faux silk roses crafted with durable stems and wrapped in elegant floral paper. The bouquet is tied with satin ribbon in either red, pink, sage green, or ivory. Brides can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/medWed.jpg'),
        array('id' => 21, 'name' => 'Everafter Large Bouquet', 'price' => 49.99, 'url' => 'bridal.php', 'description' => 'The Ever After Large Bouquet offers a grand, luxurious arrangement of twenty-four faux silk roses assembled with strong flexible stems. Wrapped in high-end floral paper and secured with satin ribbon in either red, pink, sage green, or ivory. This bouquet is perfect for brides seeking a bold and elegant floral statement. Customers can customize their bouquet by choosing which color they would like to have their bouquet to be done in. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/largeWed.jpg'),
        array('id' => 30, 'name' => '1 Enchanted Prom Corsage', 'price' => 29.99, 'url' => 'prom.php', 'description' => 'The Single Flower Enchanted Prom Corsage features one faux silk rose attached to a flexible plastic stem and finished with an elegant satin ribbon wristband in either red, pink, sage green, or ivory. Customers can personalize their corsage by selecting their preferred rose color, creating a beautiful, coordinated look for prom night.  The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/oneProm.jpg'),
        array('id' => 31, 'name' => '2 Enchanted Prom Corsage', 'price' => 39.99, 'url' => 'prom.php', 'description' => 'The Two Flowers Enchanted Prom Corsage includes two faux silk roses carefully arranged and tied with a satin ribbon in either red, pink, sage green, or ivory. Customers can customize their corsage by choosing either colors, offering a stylish and personalized accessory to complement their prom attire.  The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/twoProm.jpg'),
        array('id' => 32, 'name' => '3 Enchanted Prom Corsage', 'price' => 49.99, 'url' => 'prom.php', 'description' => 'The Three Flowers Enchanted Prom Corsage is a fuller, more eye-catching option featuring three faux silk roses assembled with strong flexible stems and wrapped with elegant ribbon in either red, pink, sage green, or ivory. Customers may choose up from these different rose colors to create a vibrant, custom-designed corsage for their special event. The result of the order is exactly like the picture with the chosen color of ribbon by the customer. ', 'picture' => '/images/threeProm.jpg')
    );
    //This for each look checks to see if the name the user inputted into the 
    //search box matches any of the products from our company. 
    //Those names are put into an array and stoed for displaying. 
    foreach ($all_products as $product) {
        if (stripos($product['name'], $search_query) !== false) {
            $products[] = $product;
        }
    }
}
?>
<!--This does the same display as the product display file we have. However,
instead it checks the array if there are any values. If there aren't the screen
will display that no products were found. However, if there was, then the 
desired search and all of properties will appear to the user.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <h1 class="category-title">Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h1>
    
    <?php if (empty($products)): ?>
        <p class="no-results">No products found matching your search. Please try a different search term.</p>
    <?php else: ?>
        <p class="results-count">Found <?php echo count($products); ?> product(s).</p>
        
        <div class="product-container">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <a href="<?php echo $product['url']; ?>">
                        <img src="<?php echo htmlspecialchars($product['picture']); ?>" class="product-image" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </a>
                    <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="product-price">$<?php echo number_format($product['price'], 2); ?></p>
                    <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                    
                    <form action="add.php" method="post" class="product-form">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                        
                        <select name="color" class="product-select">
                            <option value="Default">Select Color</option>
                            <option value="Red">Red</option>
                            <option value="Pink">Pink</option>
                            <option value="Sage Green">Sage Green</option>
                            <option value="Ivory">Ivory</option>
                        </select>
                        
                        <div class="quantity-wrapper">
                            <button type="button" class="quantity-btn" onclick="decrementQuantity(this)">-</button>
                            <span class="quantity-number">1</span>
                            <input type="hidden" name="quantity" value="1">
                            <button type="button" class="quantity-btn" onclick="incrementQuantity(this)">+</button>
                        </div>
                        
                        <button type="submit" name="add" class="add-cart-btn">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        
        <script>
            function incrementQuantity(button) {
                const wrapper = button.closest('.quantity-wrapper');
                const quantityDisplay = wrapper.querySelector('.quantity-number');
                const quantityInput = wrapper.querySelector('input[name="quantity"]');
                
                let currentQuantity = parseInt(quantityDisplay.textContent);
                currentQuantity++;
                
                quantityDisplay.textContent = currentQuantity;
                quantityInput.value = currentQuantity;
            }
            
            function decrementQuantity(button) {
                const wrapper = button.closest('.quantity-wrapper');
                const quantityDisplay = wrapper.querySelector('.quantity-number');
                const quantityInput = wrapper.querySelector('input[name="quantity"]');
                
                let currentQuantity = parseInt(quantityDisplay.textContent);
                if (currentQuantity > 1) {
                    currentQuantity--;
                    quantityDisplay.textContent = currentQuantity;
                    quantityInput.value = currentQuantity;
                }
            }
        </script>
    <?php endif; ?>
     <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>