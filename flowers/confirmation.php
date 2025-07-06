<?php
//These lines of code are made to start the session if it is not open already.
//if there is not order_id them the user is sent back to the homepage
//then thier id is checked to make aure it its theirs if it is not they are sent back to 
//the homepage
//However, if it does get by, then the order id ifs stored within a variable 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    header("Location: index.php");
    exit;
}


if (!isset($_SESSION['order']) || $_SESSION['order']['order_id'] != $_GET['order_id']) {
    header("Location: index.php");
    exit;
}

$order = $_SESSION['order'];
?>

<!-- This whold html code is intended to display to the users that their
 order was successful. The detail are then printed as well (the order num, the date, their name
 , email, address, and their total). Under that is the items that were ordered by the user
 and then they have the ability to return home. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="/images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="confirmation-container">
        <div class="confirmation-box">
            <div class="confirmation-header">
                <h1>Thank You for Your Order!</h1>
                <p>Your order has been successfully placed and is being processed.</p>
            </div>
            
            <div class="order-details">
                <h3>Order Details</h3>
                
                <div class="order-detail-row">
                    <div>Order Number:</div>
                    <div><strong><?php echo htmlspecialchars($order['order_id']); ?></strong></div>
                </div>
                
                <div class="order-detail-row">
                    <div>Date:</div>
                    <div><strong><?php echo date('F j, Y', strtotime($order['date'])); ?></strong></div>
                </div>
                
                <div class="order-detail-row">
                    <div>Name:</div>
                    <div><strong><?php echo htmlspecialchars($order['name']); ?></strong></div>
                </div>
                
                <div class="order-detail-row">
                    <div>Email:</div>
                    <div><strong><?php echo htmlspecialchars($order['email']); ?></strong></div>
                </div>
                
                <div class="order-detail-row">
                    <div>Address:</div>
                    <div>
                        <strong>
                            <?php echo htmlspecialchars($order['address']); ?><br>
                            <?php echo htmlspecialchars($order['city']); ?>, 
                            <?php echo htmlspecialchars($order['state']); ?> 
                            <?php echo htmlspecialchars($order['zip_code']); ?>
                        </strong>
                    </div>
                </div>
                
                <div class="order-detail-row">
                    <div>Total:</div>
                    <div><strong>$<?php echo number_format($order['total'], 2); ?></strong></div>
                </div>
            </div>
            
            <div class="order-items">
                <h3>Items Ordered</h3>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['items'] as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td><?php echo htmlspecialchars($item['color']); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>$<?php echo number_format($item['price'], 2); ?></td>
                                <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <div class="confirmation-buttons">
                <a href="index.php" class="view-all-button">Return to Home</a>
            </div>
        </div>
    </div>
     <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>