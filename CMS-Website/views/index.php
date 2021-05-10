<?php
include "../controllers/pageController.php";

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Virtua - New Amazing HTML5 Template</title>
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <!-- CUSTOM STYLE -->
    <link rel="stylesheet" href="css/template-style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext"
          rel="stylesheet">
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
    <!-- Header -->
    <header class="section background-image text-center"
            style="background-image:<?php echo "url(../../CMS-Panel/upload/{$homeData['pic']})" ?>">
        <div style="text-align: center" class="margin-top-40">
            <?= $homeData['text'] ?>

            <!--        <h1 class="text-extra-thin text-white text-s-size-30 text-m-size-40 text-size-50 text-line-height-1 margin-bottom-40 margin-top-130">-->
            <!--            Welcome Text here!-->
            <!--        </h1>-->
            <!--        <p class="animated-element text-white">Short Description for Welcome text!</p></div>-->
            <!-- white full width arrow object -->
            <img class="arrow-object" src="img/arrow-object-white.svg" alt="">
    </header>

    <!-- Section 1 -->
    <section class="section-top-padding background-white">
        <div class="line text-center">
            <i class="icon-sli-heart text-primary text-size-40"></i>
            <h2 class="text-dark text-size-50 text-m-size-40"><b>Services</b></h2>
            <hr class="break background-primary break-small break-center margin-bottom-50">
        </div>
        <div class="line">
            <div class="margin2x">
                <div class="s-12 m-6 l-4 margin-bottom-60">
                    <div class="float-left">
                        <i class="icon-sli-equalizer text-primary text-size-40 text-line-height-1"></i>
                    </div>
                    <div class="margin-left-60">
                        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-20">Service 1</h3>
                        <div style="width: 250px">
                            <img src="<?php echo "../../CMS-Panel/upload/{$service1->getPic()}" ?>">
                        </div>
                        <a class="text-more-info text-primary" href="service1.php">Read more</a>
                    </div>
                </div>
                <div class="s-12 m-6 l-4 margin-bottom-60">
                    <div class="float-left">
                        <i class="icon-sli-layers text-primary text-size-40 text-line-height-1"></i>
                    </div>
                    <div class="margin-left-60">
                        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-20">Service 2</h3>
                        <div style="width: 250px">
                            <img src="<?php echo "../../CMS-Panel/upload/{$service2->getPic()}" ?>" width="100%">
                        </div>
                        <a class="text-more-info text-primary" href="service2.php">Read more</a>
                    </div>
                </div>
                <div class="s-12 m-6 l-4 margin-bottom-60">
                    <div class="float-left">
                        <i class="icon-sli-share text-primary text-size-40 text-line-height-1"></i>
                    </div>
                    <div class="margin-left-60">
                        <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-20">Service 3</h3>
                        <div style="width: 250px">
                            <img src="<?php echo "../../CMS-Panel/upload/{$service3->getPic()}" ?>">
                        </div>
                        <a class="text-more-info text-primary" href="service3.php">Read more</a>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!-- Section 2 -->
    <section class="section-top-padding background-white">
        <div class="line text-center">
            <i class="icon-sli-layers text-primary text-size-40 margin-bottom-20"></i>
            <h2 class="text-dark text-size-50 text-m-size-40"><b>Portfolio</b></h2>
            <hr class="break background-primary break-small break-center margin-bottom-50">
        </div>
        <div class="line">
            <div class="margin2x">
                <?php foreach ($ports as $port): ?>
                    <div class="s-12 m-6 l-3 margin-bottom-60">
                        <div class="float-left">
                            <i class="icon-sli-bulb text-primary text-size-40 margin-bottom-20"></i>
                        </div>
                        <div class="margin-left-60">
                            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-20"><?= $port['title'] ?></h3>
                            <div style="width: 250px">
                                <img src="<?php echo "../../CMS-Panel/upload/{$port['pic1']}" ?>" width="100%">
                            </div>
                            <a class="text-more-info text-primary" href="portfolio.php">Read more</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>

    <!-- Section 3 -->
    <section class="background-dark full-width">
        <div class="m-12 l-6 xl-5 xxl-4">
            <img class="full-img" src="<?php echo "../../CMS-Panel/upload/{$aboutData['pic']}" ?>"/>
        </div>
        <div class="m-12 l-6 xl-7 xxl-8">
            <div class="l-12 xl-11 xxl-8 padding-2x">
                <h2 class="text-l-size-40 text-size-50 text-white">Always Nearby <b>Herzing</b></h2>
                <!-- white Start your Business object -->
                <img class="margin-left-20 margin-top-30 margin-bottom-60" src="img/start-your-business.svg" alt="">
            </div>
        </div>
    </section>

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


