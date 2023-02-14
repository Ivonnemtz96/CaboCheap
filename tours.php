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
    
    

    
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
            

                <div class="destination-list">



                <?php
                $toursData = $db->getAllRecords('tours', '*', ' ORDER BY nombre ASC');
                if (count($toursData) > 0) {
                    $y    =    '';
                    foreach ($toursData as $tour) {
                        $catSel = $db->getAllRecords('toursCate', 'nombre', 'AND id=' . $tour['categoria'] . '', 'LIMIT 1')[0];
                ?>




                        <div class="trend-full bg-white rounded box-shadow overflow-hidden p-4 mb-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-3">
                                <div class="trend-item2 rounded">
                                    <a href="/tour?id=<?php echo ($tour['id']); ?>"
                                        style="background-image: url(/upload/tours/<?php echo (strftime("%Y/%m", strtotime(($tour['fr'])))); ?>/<?php echo ($tour['fPortada']) ?>.jpg);"></a>
                                    <div class="color-overlay"></div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="trend-content position-relative text-md-start text-center">
                                    <small><?php echo ($tour['duracion']); ?> horas</small>
                                    <h3 class="mb-1"><a href="/tour?id=<?php echo ($tour['id']); ?>"><?php echo ($tour['nombre']); ?> horas</a></h3>
                                    <h6 class="theme mb-0"></i> <?php echo ($catSel['nombre']); ?></h6>
                                    <p class="mt-2 mb-0"><?php echo substr(strip_tags($tour['descripcion']), 0, 130); ?>...</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="trend-content text-md-end text-center">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <div class="trend-price my-2">
                                        <span class="mb-0">Desde</span>
                                        <h3 class="mb-0">$<?php echo number_format($tour['precioPromo'], 2); ?></h3>
                                        <small>Por adulto</small>
                                    </div>
                                    <a href="/tour?id=<?php echo ($tour['id']); ?>" class="nir-btn">Ver</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    }
                }
                ?>


                    


                </div>
            </div>
            
        </div>
    </div>
</section>
    
    
    
    
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/footer.php"); ?>
    
    
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    
    <?php require_once($_SERVER["DOCUMENT_ROOT"]."/modulos/js.php"); ?>
    
</body>


</html>