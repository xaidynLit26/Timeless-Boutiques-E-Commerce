<!--This PHP page is the about us portion of our website.
This page link is located in the footer of the website. It provides 
users with the story behind our company, the values we uphold, coustomer
reviews, information about the store, and what the best way to be in contact with us 
is. -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>About Us - Timeless Boutiques</title>
        <link rel="icon" type="image/png" href="/images/logo.png">
<!--This links our CSS Styles sheet so that we can access and be able to do CSS modifications
to this webpage-->
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<!--This line of code incorporates the header.php page into this portion of the webpage 
this is done for redundancy .-->
        <?php include 'header.php'; ?>
        
<!--This the beginning of the "Our Story" section of the about us page. This is a 
div container that holds the title of this section as well as the text within the 
"Our Story" descpition. -->
        <div class="about-container">
            <div class="about-section">
<!--The section of code that projects the text on to the webpage for the "Our Story" section. 
Each of these tags are assigned their own classes for styling purposes. -->
                <h1 class="about-title">Our Story</h1>
                <p class="about-text">
                    Welcome to Timeless Boutiques, where artisanal floral designs meet timeless elegance. Founded in 2025, our boutique was born from a passion for creating floral arrangements that capture the essence of life's most cherished moments.
                </p>
                
                <p class="about-text">
                    At Timeless Boutiques, we take pride in our commitment to quality, sustainability, and personalized service. Each arrangement is handcrafted with care, using only the finest roses sourced from responsible growers who share our values of environmental.
                </p>
            </div>
            
        </div>
    <!--end of this container div-->

<!--The start of the our values section. This section defines the values we uphold as a 
company to the user.-->

        <h1>Our Values</h1>

    <!--This div is the start of the our values section which will hold nested div elements for 
    layout and placement purposes. -->

        <div class="value-section">

<!--The first of nested divs that will keep the information of Quality put together. This will 
allow us to use CSS styling to place this, soon to be box, of information in our desired 
destination on the page.-->
            <div class="value-card">
                <h3>Quality</h3>
                <p>We source only premium roses and materials, ensuring that each arrangement meets our high standards.</p>
            </div>
<!--The is the second of nested divs which hold the same purpose as the previous div above-->
            <div class="value-card">
                <h3>Sustainability</h3>
                <p>We partner with gardens that practice responsible growing methods to provide you with the best flowers.</p>
            </div>
<!--This is the last of the nested divs within this value-section div tag. This div holds 
the same purpose as the others above it-->
            <div class="value-card">
                <h3>Personalization</h3>
                <p>We believe that each arrangement should be as unique as the occasion it celebrates.</p>
            </div>
        </div>
        <!--End of the value-section div container-->
            
        <!--This container holds the next section to the about us page. That section has to do 
        with Coustomer Testimonials. This is the start of this container -->
            <div class="about-section">
                <h1 class="about-title">Customer Testimonials</h1>
                <div class="testimonials">
                    <!--This div holds all the information of the testimonials together in one place.
                    It is done so this way to allow styling capablities-->

                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "The bridal bouquet from Timeless Boutiques made my wedding day perfect. The roses were magnificent, and they matched my color scheme perfectly. The team was so helpful throughout the entire process!"
                        </p>
                        <p class="testimonial-author">- Sarah J</p>
                    </div>
                    
                    <!--This div also holds the same properties as the one mentioned above.-->
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "My daughter's prom corsage was stunning! It complemented her dress beautifully and stayed fresh all night."
                        </p>
                        <p class="testimonial-author">- Michael</p>
                    </div>
                    <!--This div also holds the same properties as the one mentioned above.-->
                    <div class="testimonial-card">
                        <p class="testimonial-text">
                            "I'm a repeat customer because Timeless Boutiques consistently delivers quality arrangements. Their roses last longer than any others I've purchased, and their designs are simply exquisite."
                        </p>
                        <p class="testimonial-author">- Lisa</p>
                    </div>
                </div>
            </div>
<!--This is the end of the container holding the Coustomer Testimonials.-->
        
<!--This is the div responsible for holding the values of the "Visit Our Shop" Section for 
our page towards the bottom fo the about us webpage.-->
            <div class="about-section">
                <h1 class="about-title">Visit Our Shop</h1>
                
                <!---All the p tags hold some CSS styling in order to make certain sections of 
                the text stand out to the user when looking at this section of this webpage-->
                <p class="about-text" style="text-align: center;">
                    We invite you to visit our boutique in person to experience our beautiful flowers and see our amazin job.
                </p>
                
                <p class="about-text" style="text-align: center; font-weight: bold; margin-top: 30px;">
                    123 Blossom Street<br>
                    Newark, New Jersey<br>
                    (555) 123-4567<br>
                    info@timelessboutiques.com
                </p>
                
                <p class="about-text" style="text-align: center; margin-top: 30px;">
                    <strong>Store Hours:</strong><br>
                    Monday - Friday: 9:00 AM - 6:00 PM<br>
                    Saturday: 10:00 AM - 5:00 PM<br>
                    Sunday: Closed
                </p>
            </div>
        </div>
        <!--This is the end of the div that holds the Visit Our Shop information-->

        <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
        <?php include 'footer.php'; ?>
    </body>
</html>