<?php
include('indexcontroller.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/include/funciones.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$fecha = date("Y-m-d H:i:s");

if (isset($_REQUEST['tokenPed'])) {

    $pedidoSel = $db->getAllRecords('pedidos', '*', 'AND codigo="'.$_REQUEST['tokenPed'].'"', 'LIMIT 1');

    //SI NO HAY ID EN EL GET MANDA ERROR
    if (!($pedidoSel)) {
        setcookie("msg", "toursel", time() + 2, "/");
        header('location:/tours');
        exit;
    }

    $pedidoSel = $pedidoSel[0];


    $tourSel = $db->getAllRecords('tours', '*', 'AND id="'.$pedidoSel['tour'].'"', 'LIMIT 1');

            //SI NO HAY ID EN EL GET MANDA ERROR
            if (!($tourSel)) {
                setcookie("msg", "toursel", time() + 2, "/");
                header('location:/tours');
                exit;
            }

            $tourSel = $tourSel[0];

            //Calculamos total a pagar segun numero de adultos y menores
            $total = ($tourSel['precioPromo']) * ($pedidoSel['adultos']);
            $total += ($tourSel['precioNiPromo']) * ($pedidoSel['menores']);

            $personas = $pedidoSel['adultos'] + $pedidoSel['menores'];
    
} else {
    if (isset($_REQUEST['submit'])) {


        extract($_REQUEST);

        if (($fv == "") & ($adultos == "") & ($tour == "")) {
            setcookie("msg", "pedall", time() + 2, "/");
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
                header('location:/tour.php?id=' . $tour . '');
                exit;
            }

            $tourSel = $tourSel[0];

            //Calculamos total a pagar segun numero de adultos y menores
            $total = ($tourSel['precioPromo']) * ($adultos);
            $total += ($tourSel['precioNiPromo']) * ($menores);

            $personas = $adultos + $menores;


            $codigo = GeraHash(15);

            $caractCount    =    $db->getQueryCount('pedidos', 'id');
            if ($caractCount[0]['total'] < 10000) {
                $data    =    array(
                    'tour' => ($tour),
                    'status' => 1,
                    'codigo' => ($codigo),
                    'fr' => ($fecha),
                    'fv' => ($fv),
                    'adultos' => ($adultos),
                    'menores' => ($menores),
                    'nombre' => ($nombre),
                    'telefono' => ($telefono),
                    'comentarios' => ($comentarios),
                    'email' => ($email),

                );
                $insert    =    $db->insert('pedidos', $data);
                if ($insert) {
                    setcookie("msg", "toursel", time() + 2, "/");
                    header('location:/pago?tokenPed='.$codigo.'');
                    exit;
                } else {
                    setcookie("msg", "ups", time() + 2, "/");
                    header('location:/tour.php?id=' . $tour . '');
                    exit;
                }
            } else {
                setcookie("msg", "lim", time() + 2, "/");
                header('location:/tour.php?id=' . $tour . '');
                exit;
            }
        }
    } else {
        setcookie("msg", "toursel", time() + 2, "/");
        header('location:/tours');
        exit;
    }
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
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/top.php"); ?>
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/menu.php"); ?>
    </header>


   <?
   include($lenguaje."/pago.php");
   ?>

</body>


</html>