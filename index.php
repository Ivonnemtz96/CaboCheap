<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    
    
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cabo Cheap Tours</title>

    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/css.php"); ?>
    
</head>

<body>
    
    <div id="preloader">
        <div id="status"></div>
    </div>
    
    
    <header class="main_header_area">
        <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/top.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/menu.php"); ?>
    </header>
    
    <div class="tet"></div>
    
    
    
    <section class="banner pt-10 pb-0 overflow-hidden" style="background-image:url(images/testimonial.png);">
        <div class="container">
            <div class="banner-in">
                
                <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/banner.php"); ?>
                
                <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/categorias.php"); ?>
                
                
                
                
            </div>
        </div>
    </section>
    
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/about.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/tours.php"); ?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/reviews.php"); ?>
    
    
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/footer.php"); ?>
    
    
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/js.php"); ?>
    
</body>


</html>