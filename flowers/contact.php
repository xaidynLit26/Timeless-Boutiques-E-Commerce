<!--This web page is responsible for contact portion of our website.
This web page can be accessed from the footer. It describes the contact 
information of the company. -->
<!DOCTYPE html>
 <html lang="en">
     <head>
     <meta charset="UTF-8">
         <title>Contact Us - Timeless Boutiques</title>
         <link rel="icon" type="image/png" href="/images/logo.png">
          <!--This links our CSS Styles sheet so that we can access and be able to do CSS modifications
to this webpage-->
         <link rel="stylesheet" href="styles.css">
     </head>
     <body>
           <!--This line of code incorporates the header.php page into this portion of the webpage 
this is done for redundancy .-->
         <?php include 'header.php'; ?>
<!--This is this beginning of the div sections that contains the contact
information for the store. -->
         <div class="about-section">
                <h1 class="about-title">Visit Our Shop</h1>
                
                <!--All of these p tags contain the information projected to the 
                user on the webpage. There are cartain CSS styles embedded into the 
                the tags for clarity to the user."-->
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
         <br>
         <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
         <?php include 'footer.php'; ?>
     </body>
 </html>
 <!--Coded by Xamarys Liranzo, Santiago Murillo, and Jean Malinao-->