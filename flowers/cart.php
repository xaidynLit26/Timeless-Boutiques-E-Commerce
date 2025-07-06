<?php
//This php code is in charge of managing the addition/subtraxtion of items in the cart 
/*
It will start the session for the cart
then it will create an empty one. 
it will either update or remove things from the cart depedning on the 
url values 
then the total of the cart will be calculated
*/
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}
if (isset($_GET['remove']) && !empty($_GET['remove'])) {
    $index = (int)$_GET['remove'];
    if (isset($_SESSION['cart_items'][$index])) {
        unset($_SESSION['cart_items'][$index]);
        $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
    }
}
if (isset($_GET['update']) && isset($_GET['quantity'])) {
    $index = (int)$_GET['update'];
    $quantity = (int)$_GET['quantity'];
    if (isset($_SESSION['cart_items'][$index])) {
        if ($quantity > 0) {
            $_SESSION['cart_items'][$index]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart_items'][$index]);
            $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
        }
    }
}
$total = 0;
foreach ($_SESSION['cart_items'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!--The rest of this code displays the shopping cart that users will see when checking out
if there is nothing in the cart, users will be directed back to the homepage to 
contunie shopping. However, if they do have stuff in the cart, the product, color, Price, Quantity, -and total are displayed. (THIS IS ONLY A SIMULATION)-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>  
    <div class="cart-container">
        <div class="cart-header">
            <h1 class="page-title">Your Shopping Cart</h1>
        </div>
        
        <?php if (empty($_SESSION['cart_items'])): ?>
            <div class="empty-cart">
                <p>Your cart is empty. <a href="index.php">Continue shopping</a></p>
            </div>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart_items'] as $index => $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item["name"]); ?></td>
                            <td><?php echo htmlspecialchars($item["color"]); ?></td>
                            <td>$<?php echo number_format($item["price"], 2); ?></td>
                            <td>
                                <div class="cart-quantity">
                                    <a href="cart.php?update=<?php echo $index; ?>&quantity=<?php echo $item["quantity"] - 1; ?>" class="quantity-btn">-</a>
                                    <span><?php echo $item["quantity"]; ?></span>
                                    <a href="cart.php?update=<?php echo $index; ?>&quantity=<?php echo $item["quantity"] + 1; ?>" class="quantity-btn">+</a>
                                </div>
                            </td>
                            <td>$<?php echo number_format($item["price"] * $item["quantity"], 2); ?></td>
                            <td>
         
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="cart-total">
                Total: <span>$<?php echo number_format($total, 2); ?></span>
            </div>
            
            <div class="cart-buttons">
                <a href="index.php" class="view-all-button">Continue Shopping</a>
                <a href="checkout.php" class="view-all-button">Proceed to Checkout</a>
            </div>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>