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
                Service 1
            </h1>
            <p class="animated-element text-white">Duis autem vel eum iriure dolor in hendrerit in</p>

            <!-- white full width arrow object -->
            <img class="arrow-object" src="img/arrow-object-white.svg" alt="">
        </header>

        <!-- Section 1 -->
        <section class="section background-white">
            <div class="line">
                <div class="margin2x">

                    <div class="m-12 l-6 margin-bottom-60">
                        <div class="float-left">
                            <h3 class="text-strong text-size-20 text-line-height-1 margin-bottom-20"><?= $service3->getTitle()?></h3>
                            <?= $service3->getText()?>
                        </div>
                    </div>
                    <div class="s-12 m-6 margin-bottom-30">
                        <img class="full-img" src="<?php echo "../../CMS-Panel/upload/{$service3->getPic()}" ?>" alt=""/>
                    </div>

                </div>
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