<!--This portion of the website is in charge of the header. It displays the 
nav bar to the user. It has links for the user to have access to things like 
"Login", "Register", "Bridal", etc.  It also displays a search engine so that users
are able to find products one by one. -->
<?php
require_once 'db_connection.php';
?>
<header class="sticky-header">
    <a href="index.php">
        <!--The logo picture of the compnay-->
        <img src="images/logo.png" alt="Logo" class="sticky-header-logo">
    </a>
    <!--The beginning of the nav bar-->
    <nav class="sticky-header-text">
        <a href="bouquets.php">Bouquets</a>
        <a href="bridal.php">Bridal</a>
        <a href="prom.php">Prom</a>
        <a href="boutonniere.php">Boutonniere</a>
        <a href="shop.php">Shop All</a>
<!--This portion of the code checks if the user had sucessfully logged in. 
If they have It displays thier name as their account. It then gives and option to 
logout, and if the user clicks to logout it triggers the logout.php file to occur.-->
        <?php if (login()): ?>
            <a href="account.php"><?php echo htmlspecialchars(getUserFullName()); ?>'s Account</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <!--If the user is not logged in they continue to have the 
            register link available to them next to the login link.-->
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
        <a href="cart.php"><img class="sticky-header-cart" alt="cart" src="images/shoppingcart.png"></a>
    </nav>
    <!--end of nav bar-->

    <!--This is the div tag that takes care of the search bar 
    component of the website-->
    <div class="search-bar">
        <!--This form takes the information that the user inputs, the 
        name of the flower they are looking for and sends it to search_results.php
        after the user clicks submit. From there that php file will display to the user 
        the flower display they are looking for -->
        <form action="search_results.php" method="GET">
            <input type="text" name="query" placeholder="Search products...">
            <button type="submit">Search</button>
        </form>
        <!--This is the end of the form-->
    </div>
    <!--This is the end of the div-->
</header>