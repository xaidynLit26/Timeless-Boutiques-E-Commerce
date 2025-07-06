<?php
//This portion of code starts the session. 
//This for each loop loops over the items of the cart and adds the total of the 
//prices together. 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$name = $email = $address = $city = $state = $zip_code = '';

if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}

$total = 0;
foreach ($_SESSION['cart_items'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

//This begins when the user submits the form
//it takes the users information and creates 
//it then stores the users values
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $city = trim($_POST["city"] ?? "");
    $state = trim($_POST["state"] ?? "");
    $zip_code = trim($_POST["zip_code"] ?? "");
    $card_number = trim($_POST["card_number"] ?? "");
    $expiration = trim($_POST["expiration"] ?? "");
    $cvv = trim($_POST["cvv"] ?? "");
    $name_on_card = trim($_POST["name_on_card"] ?? "");
    
    $order_id = uniqid('ORD');
    
    $_SESSION['order'] = [
        'order_id' => $order_id,
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'zip_code' => $zip_code,
        'total' => $total,
        'items' => $_SESSION['cart_items'],
        'date' => date('Y-m-d H:i:s')
    ];

    //this empties the cart
    
    $_SESSION['cart_items'] = [];
    
    //this takes the user to the confirmation page.
    header("Location: confirmation.php?order_id=" . $order_id);
    exit;
}
?>
<!--this page asks the user for their personal information in order for the user 
to be able to complete their order-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="checkout-container">
        <div class="checkout-form">
            <h1 class="page-title">Checkout</h1>
            <p class="page-subtitle">Please enter your information to complete your order.</p>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h2 class="section-title">Shipping Information</h2>
                
                <table class="form-table">
                    <tr>
                        <td>City:</td>
                        <td>
                            <input type="text" name="city" class="form-input" value="<?php echo htmlspecialchars($city); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>State:</td>
                        <td>
                            <input type="text" name="state" class="form-input" value="<?php echo htmlspecialchars($state); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>ZIP Code:</td>
                        <td>
                            <input type="text" name="zip_code" class="form-input" value="<?php echo htmlspecialchars($zip_code); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Address:</td>
                        <td>
                            <input type="text" name="address" class="form-input" value="<?php echo htmlspecialchars($address); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Name:</td>
                        <td>
                            <input type="text" name="name" class="form-input" value="<?php echo htmlspecialchars($name); ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="email" name="email" class="form-input" value="<?php echo htmlspecialchars($email); ?>">
                        </td>
                    </tr>
                </table>
                
                <h2 class="section-title">Payment Information</h2>
                
                <table class="form-table">
                    <tr>
                        <td>Card Number:</td>
                        <td>
                            <input type="text" name="card_number" class="form-input" placeholder="1234 5678 9012 3456">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Expiration (MM/YY):</td>
                        <td>
                            <div class="split-inputs">
                                <input type="text" name="expiration" class="form-input" placeholder="MM/YY">
                                <input type="text" name="cvv" class="form-input" placeholder="CVV">
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Name on Card:</td>
                        <td>
                            <input type="text" name="name_on_card" class="form-input" placeholder="John Doe">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="text-align: center; padding-top: 20px;">
                            <h3 style="color: #B08E7D; margin-bottom: 10px;">Payment Method</h3>
                            <p style="color: #B08E7D;">This is a simulation - no actual payment will be processed</p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="complete-btn">Complete Order</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!--THis div starts the order summary portion of this cart-->
        <div class="order-summary">
            <h2 class="summary-title">Order Summary</h2>
            
            <?php if (!empty($_SESSION['cart_items'])): ?>
                <?php foreach ($_SESSION['cart_items'] as $item): ?>
                    <div class="product-details">
                        <div>
                            <span class="product-name"><?php echo htmlspecialchars($item['name']); ?></span>
                            <span class="product-price">$<?php echo number_format($item['price'], 2); ?></span>
                        </div>
                        <div>Color: <?php echo htmlspecialchars($item['color']); ?></div>
                        <div>Qty: <?php echo $item['quantity']; ?></div>
                    </div>
                    <div class="summary-divider"></div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="product-details">
                    <div>
                        <span class="product-name">Timeless Large Bouquet</span>
                        <span class="product-price">$49.99</span>
                    </div>
                    <div>Color: Default</div>
                    <div>Qty: 1</div>
                </div>
                <div class="summary-divider"></div>
            <?php endif; ?>
            <!--THis div class displays and formats the total amount that the user must pay-->
            <div class="total-row">
                Total
                <span class="total-amount">
                    $<?php echo !empty($_SESSION['cart_items']) ? number_format($total, 2) : '49.99'; ?>
                </span>
            </div>
        </div>
    </div>
     <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->