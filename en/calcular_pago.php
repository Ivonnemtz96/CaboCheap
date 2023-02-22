<?
 $total = ($tourSel['precioPromo']) * ($pedidoSel['adultos']);
 $total += ($tourSel['precioNiPromo']) * ($pedidoSel['menores']);
 $total = $total / $tipo_cambio;
?>