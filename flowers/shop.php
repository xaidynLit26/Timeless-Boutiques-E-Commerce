<!--This php file is responsible for the "Shop All" section of our website.
This "Shop All" section of our webpage incoperates all of the flowers we sell in the 
store. Redundancy was done by calling the productDisplay php file which displays all 
of our items information from our database. We were then able to get the category id 
for each type of flower and call for it to be displayed. -->

<?php
session_start();
include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>Timeless Boutiques</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
        <!--Our CSS Style sheet link-->
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <!--This includes the header php header file to be implmented within this section 
        of the webpage-->
        <?php include 'header.php'; ?>

        <!-- This line of code takes the products within out database with the 
         category id of 1 and displays it on this section of the webpage by 
         including the productDisplay file.-->
        <h1>Timeless Boutiques</h1>
        <?php $category_id = 1;  include 'productDisplay.php'; ?>

          <!-- This line of code takes the products within out database with the 
         category id of 2 and displays it on this section of the webpage by 
         including the productDisplay file.-->
        <h1>Ever After Boutiques</h1>
        <?php $category_id = 2; include 'productDisplay.php'; ?>

          <!-- This line of code takes the products within out database with the 
         category id of 4 and displays it on this section of the webpage by 
         including the productDisplay file.-->
        <h1>Eternelle Bloom Boutonniere</h1>
        <?php $category_id = 4; include 'productDisplay.php'; ?>

              <!-- This line of code takes the products within out database with the 
         category id of 3 and displays it on this section of the webpage by 
         including the productDisplay file.-->
        <h1>Enchanted Prom Corsage</h1>
        <?php $category_id = 3; include 'productDisplay.php'; ?>

    </body>
      <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</html>