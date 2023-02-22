<?php
include('indexcontroller.php');

require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


date_default_timezone_set('America/Mazatlan');
setlocale(LC_ALL, 'es_MX');



if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);



    if (($fv == "") & ($adultos == "") & ($tour == "")) {
        setcookie("msg", "all", time() + 2, "/");
        header('location:/tour.php?id=' . $tour . '');
        exit;
    } else if ($fv == "") {
        setcookie("msg", "fevnov", time() + 2, "/");
        header('location:/tour.php?id=' . $tour . '');
        exit;
    } else if ($tour == "") {
        setcookie("msg", "toursel", time() + 2, "/");
        header('location:/tour.php?id=' . $tour . '');
        exit;
    } else if (($adultos == "0") or ($adultos == "")) {
        setcookie("msg", "adnov", time() + 2, "/");
        header('location:/tour.php?id=' . $tour . '');
        exit;
    } else {

        $tourSel = $db->getAllRecords('tours', '*', 'AND id=' . $tour . '', 'LIMIT 1');

        //SI NO HAY ID EN EL GET MANDA ERROR
        if (!($tourSel)) {
            setcookie("msg", "toursel", time() + 2, "/");
            header('location:/tours');
            exit;
        }

        $tourSel = $tourSel[0];


       include($lenguaje."/total_precio.php");

        $personas = $adultos + $menores;
    }
} else {
    setcookie("msg", "toursel", time() + 2, "/");
    header('location:/tours');
    exit;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cabo Cheap Tours</title>

    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/css.php"); ?>

</head>

<body>

    <div id="preloader">
        <div id="status"></div>
    </div>


    <header class="main_header_area">
        <?php include($lenguaje . "/top.php"); ?>
        <?php include($lenguaje . "/menu.php"); ?>
    </header>



    <?php 
    
    include($lenguaje."/detalles.php");
    require_once($lenguaje."/footer.php"); ?>


    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>

</body>


</html>