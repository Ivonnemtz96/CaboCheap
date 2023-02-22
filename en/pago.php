<section class="trending pt-6 pb-0 bg-lgrey">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-lg-5 mb-4 ps-ld-4">
                    <div class="sidebar-sticky">
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">

                            <div class="trend-full border-b pb-2 mb-2">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div style="height: 250px;" class="trend-item2 rounded">
                                            <a href="" style="background-image: url(/upload/tours/<?php echo (strftime("%Y/%m", strtotime(($tourSel['fr'])))); ?>/<?php echo ($tourSel['fPortada']) ?>.jpg);"></a>
                                            <div class="color-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 mt-4">
                                        <div class="trend-content position-relative">

                                            <h5 class="mb-1"><a href="#"><?php echo ($tourSel['nombre']) ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="trend-check border-b pb-2 mb-2">
                                <p class="mb-0">Su selección:</p>
                                <h6 class="mb-0">Personas <span class="float-end fw-normal"><?php echo $pedidoSel['adultos']; ?> adultos, <?php echo $pedidoSel['menores']; ?> niños</span> </h6>

                                <h6 class="mb-0">Fecha: <span class="float-end fw-normal"><?php echo (strftime("%d de %B del %G", strtotime($pedidoSel['fv']))); ?></span> </h6>

                            </div>
                            <div class="trend-check border-b pb-2 mb-2">
                                <p class="mb-0">Sus datos:</p>
                                <h6 class="mb-0">Nombre <span class="float-end fw-normal"><?php echo $pedidoSel['nombre']; ?></h6>
                                <h6 class="mb-0">Correo electrónico: <span class="float-end fw-normal"><?php echo $pedidoSel['email']; ?></span> </h6>
                                <h6 class="mb-0">Teléfono: <span class="float-end fw-normal"><?php echo $pedidoSel['telefono']; ?></span> </h6>


                            </div>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Costos</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td> Total</td>
                                        <td class="theme2">$<?php echo number_format($total, 2); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Personas</td>
                                        <td class="theme2"><?php echo $personas; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Impuestos</td>
                                        <td class="theme2">$<?php echo number_format(($total * 0.04), 2); ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-title">
                                    <tr>
                                        <th class="font-weight-bold white">Total</th>
                                        <th class="font-weight-bold white">$<?php echo number_format(($total * 1.04), 2); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="mt-4" id="paypal-button-container"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/footer.php"); ?>


    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/modulos/js.php"); ?>

    <script src="https://www.paypal.com/sdk/js?client-id=AZypmdhWpEOkIEmyEeJYHGjPCOmZRcqu86qmpk9FA0w8QS_w26HR4f9VuVfDM5wL6i9G_rCLo6aJIMqB&currency=MXN"></script>

<script>
// Render the PayPal button into #paypal-button-container
paypal.Buttons({
    
    style: {
        color:  'gold',
        shape:  'pill',
        label:  'pay'
    },

    // Set up the transaction
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: { value: '<?php echo ($total*1.04)?>' },
                description: "Estás pagando por un tour para <?php echo ($personas); if ($personas==1) { echo " persona"; } else { echo " personas" ;} ?>  en Cabo Cheap Tours"
            }]
        });
    },

    // Finalize the transaction
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Show a success message to the buyer
            console.log(data);
            console.log(details);
            window.location=('/completado?name=' + details.payer.name.given_name + '&email=' + details.payer.email_address + '&tokenPed=<?php echo $pedidoSel['codigo'];?>' + '&idTran=' + details.purchase_units[0].payments.captures[0].id + '&idChekOut=' + data.orderID + '&time=' + details.purchase_units[0].payments.captures[0].update_time+ '&amount=' + details.purchase_units[0].payments.captures[0].amount.value + '&currency=' + details.purchase_units[0].payments.captures[0].amount.currency_code );
            
        });
    },
    
    onCancel: function (data) {
        window.location="/pago?tokenPed=<?php echo $pedidoSel['codigo'];?>"
    },
    
    
    onError: function (err) {
        window.location="/?msg=error);?>"
    }


}).render('#paypal-button-container');
</script>