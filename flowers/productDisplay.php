<?php
if (!isset($category_id)) {
    echo "Error: No category selected";
    return;
}

$query = "SELECT id, name, description, price, image_name FROM products WHERE category_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!--All the information from the database created is pulled and is displayed on the product card
for users to be able to see clearly. Not only that, but if another item were to be added in the 
far future, it would simply and easily add another card to the website with the information 
inputted into the databse-->
<div class="flower-row">
<?php while ($row = $result->fetch_assoc()): ?>
    <form method="POST" action="flower_selection.php">
    <div class="flower-row">
        <div class="product-card">
            <a href="bouquets.php">
                <img src="<?php echo htmlspecialchars($row['image_name']); ?>" class="product-image" alt="Timeless Small Bouquet">
            </a>
            <h3 class="product-title"><?php echo htmlspecialchars($row['name']); ?></h3>
            <p class="product-price"><?php echo $row['price']; ?></p>
            <p class="product-description"><?php echo htmlspecialchars($row['description']); ?></p>
    
        </div>
    </div>
    </form>
    <form action="add.php" method="post" class="product-form">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Timeless Small Bouquet">
                <input type="hidden" name="product_price" value="29.99">
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
                <br>
                <br>
            </form>

    
    
<?php endwhile; ?>
</div>
<!--This script allows for the functionality of the increase and decrease buttons 
on the flower description card-->
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
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->