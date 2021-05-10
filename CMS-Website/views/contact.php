<?php
include "../controllers/pageController.php";

?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Virtua - New Amazing HTML5 Template</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>   
  </head>

  <body class="size-1280">
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
        <?php include "include/navbar.php" ?>
    </header>
    
    <!-- MAIN -->
    <main role="main">
      <article>    
        <!-- Header -->
        <header class="section background-image text-center" style="background-image:url(img/carousel-02.jpg)">
          <h1 class="animated-element slow text-extra-thin text-white text-s-size-30 text-m-size-40 text-size-50 text-line-height-1 margin-bottom-30 margin-top-130">
            Contact Us
          </h1>
          <p class="animated-element text-white">Duis autem vel eum iriure dolor in hendrerit in</p>
          
          <!-- white full width arrow object -->
          <img class="arrow-object" src="img/arrow-object-white.svg" alt="">
        </header>
        
        <!-- Section 1 -->
        <section class="section-small-padding background-white text-center">      
          <div class="line">
            <i class="icon-sli-heart text-primary text-size-40"></i>
            <h2 class="text-dark text-size-50 text-m-size-40">We are here for you <b class="text-primary">24/7</b></h2>
          </div>                                                                                                    
        </section>
        
        <!-- Section 2 -->
        <section class="full-width background-grey">
          <div class="m-12 l-6">
            <div class="padding-3x">
              <div class="margin2x">
                
                <div class="l-12 xl-6 margin-bottom-60">
                  <div class="float-left">
                    <i class="icon-sli-location-pin text-primary text-size-40 text-line-height-1"></i>
                  </div>
                  <div class="margin-left-60">
                    <h2 class="text-size-20 margin-bottom-10 text-strong">Company Address</h2>                
                    <p><?= $contactData['address'] ?></p>
                  </div>
                </div>
                
                <div class="l-12 xl-6 margin-bottom-60">
                  <div class="float-left">
                    <i class="icon-sli-envelope text-primary text-size-40 text-line-height-1"></i>
                  </div>
                  <div class="margin-left-60">
                    <h2 class="text-size-20 margin-bottom-10 text-strong">E-mail</h2>                
                    <p><a class="text-primary-hover" href="mailto:contact@sampledomain.com"><?= $contactData['email'] ?></a></p>
                  </div>
                </div>
                <div style="clear: both"></div>
                <div class="l-12 xl-6">
                  <div class="float-left">
                    <i class="icon-sli-earphones-alt text-primary text-size-40 text-line-height-1"></i>
                  </div>
                  <div class="margin-left-60">
                    <h2 class="text-size-20 margin-bottom-10 text-strong">Phone Numbers</h2>                
                    <a href="tel:5147776814"><?= $contactData['phone'] ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="m-12 l-6 margin-top-20">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11187.437161349188!2d-73.5746465!3d45.4927782!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a0629386b53a933!2sHerzing%20College%20Montreal!5e0!3m2!1sen!2sca!4v1594768653128!5m2!1sen!2sca" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>          </div>
        </section>
        
        <!-- Section 3 -->
        <section class="section background-dark">
          <div class="s-12 m-12 l-4 center">
            <h3 class="text-size-30 margin-bottom-40 text-center"><b>Contact Form</b></h3>
            <form class="customform text-white" method="post" enctype="multipart/form-data">
              <div class="line">
                <div class="margin">
                  <div class="s-12 m-12 l-6">
                    <input name="email" class="required email" placeholder="Your e-mail" title="Your e-mail" type="text" />
                  </div>
                  <div class="s-12 m-12 l-6">
                    <input name="name" class="name" placeholder="Your name" title="Your name" type="text" />
                  </div>
                </div>
              </div>            
                              
              <div class="line">       
                <div class="s-12">
                  <input name="subject" class="required subject" placeholder="Subject" title="Subject" type="text" />
                </div>
                <div class="s-12">
                  <textarea name="message" class="required message" placeholder="Your message" rows="3"></textarea>
                </div>
                <div class="s-12"><button class="button border-radius text-white background-primary" type="submit">Submit Button</button></div>
              </div>    
            </form>
          </div>           
        </section>
      </article>
    </main>

    <!-- FOOTER -->
    <footer>
        <?php include "include/footer.php" ?>
    </footer>
    <script type="text/javascript" src="js/responsee.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/template-scripts.js"></script> 
  </body>
</html>