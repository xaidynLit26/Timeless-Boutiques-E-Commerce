<!--This section of the webpage is responsible for displaying only the
Timeless Prom Options from our shop. You can see this when clickling on the 
"Prom" link on the nav bar."-->
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
      <!--This links our CSS Styles sheet so that we can access and be able to do CSS modifications
to this webpage-->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
     <!--This line of code incorporates the header.php page into this portion of the webpage 
this is done for redundancy .-->
    <?php include 'header.php'; ?>

    <h1>Enchanted Prom Corsage</h1>
     <!-- This line of code takes the products within out database with the 
         category id of 3 and displays it on this section of the webpage by 
         including the productDisplay file.-->
    <?php $category_id = 3; include 'productDisplay.php'; ?>

    <h1>Eternelle Bloom Boutonniere</h1>
     <!-- This line of code takes the products within out database with the 
         category id of 4 and displays it on this section of the webpage by 
         including the productDisplay file.-->
    <?php $category_id = 4; include 'productDisplay.php'; ?>

     <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->