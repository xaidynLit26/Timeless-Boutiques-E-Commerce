<!--This is the landing page to the Timeless Boutiques Page. One this page
you see the title of our company, and big picture of one of our flowers. 
Some of the selections of flowers you can purchase from us, our story about 
us under that, our values as a company, and our most purchased items.--> 
<?php
session_start();
include_once 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <!--This is the title to the webpage that you see at the very
        top-->
        <h1>Timeless Boutiques - Elegance in Every Bloom</h1>
        <h2>Handcrafted rose arrangements, designed with care for life's special moments</h2>
        <!--This div is in charge of containing the large image of the flowers
        in our desired spot-->
        <div class="carousel">
            <div class="carousel-track">
                <img src="/images/frontpage.jpg">
               
            </div>
            
            
        </div>
        <!--end of div-->
        

        <!--Line breaks-->
        <br>
        <br>
        <div></div>

        <!--This is the beginning of the Individual items section-->
        <h1>Start Your Journey Here</h1>
        <!--This displays all of the categories that have the id of 1
        on the landing page using the productDisplay.php file.-->
        <?php $category_id = 1; include 'productDisplay.php'; ?>
        <br>
        <!--The Beginnig Our Story-->
        <h1>Our Story</h1>
        <div class="text-wrap">
            <p>
                Welcome to Timeless Boutiques, where artisanal floral designs meet timeless elegance. 
                Founded in 2025, our boutique was born from a passion for creating floral arrangements 
                that capture the essence of life's most cherished moments. At Timeless Boutiques, 
                we take pride in our commitment to quality, sustainability, and personalized service. 
                Each arrangement is handcrafted with care, using only the finest roses sourced from 
                responsible growers who share our values.
            </p>
            <img src="/images/story.jpg" class="side-image">
        </div>
        <!--The ending of that section-->

         <!--The Beginnig Our Values-->
        <h1>Our Values</h1>
        <div class="value-section">
            <div class="value-card">
                <h3>Quality</h3>
                <p>We source only premium roses and materials, ensuring that each arrangement meets our high standards.</p>
            </div>
            <div class="value-card">
                <h3>Sustainability</h3>
                <p>We partner with gardens that practice responsible growing methods to provide you with the best flowers.</p>
            </div>
            
            <div class="value-card">
                <h3>Personalization</h3>
                <p>We believe that each arrangement should be as unique as the occasion it celebrates.</p>
            </div>
        </div>
        <!--Ending of Our Values-->

        <br>
        <br>

        <!--Beginning ofMost Purchased-->
        <h1>Most Purchased</h1>
        <div class="flower-row">
            <div class="flower-item"><h2>
                <a href="">
                    <img href="productDisplay.php" src="/images/smallBoq.jpg" class="flower-image">
                </a>
                <p class="flower-details">Timeless Small Bouquet</p>
                <p class="flower-details">$29.99</p>
            </h2></div>
            
            <div class="flower-item"><h2>
                <a href="">
                    <img href="about.php" src="/images/medWed.jpg" class="flower-image">
                </a>
                <p class="flower-details">Everafter Medium Bouquet</p>
                <p class="flower-details">$39.99</p>
            </h2></div>

            <div class="flower-item"><h2>
                <a href="">
                    <img href="about.php" src="/images/twoBoot.jpg" class="flower-image">
                </a>
                <p class="flower-details">2 Eternelle Bloom Boutonniere</p>
                <p class="flower-details">$39.99</p>
            </h2></div>
        </div>
        <!--Ending of Most Purchased-->

        <br>
        <br>
        <br>


    </body>
       <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</html>
<!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->