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

                            <div class="trend-check">
                                <p class="mb-0">Su selección:</p>
                                <h6 class="mb-0">Personas <span class="float-end fw-normal"><?php echo $adultos; ?> adultos, <?php echo $menores; ?> niños</span> </h6>

                                <h6 class="mb-0">Fecha: <span class="float-end fw-normal"><?php echo (strftime("%d de %B del %G", strtotime($fv))); ?></span> </h6>

                            </div>
                        </div>
                        <div class="sidebar-item bg-white rounded box-shadow overflow-hidden p-3 mb-4">
                            <h4>Costos</h4>
                            <table>
                                <tbody>
                                    <tr>
                                        <td> Total</td>
                                        <td class="theme2">$<?php echo number_format($total, 2); ?> MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Personas</td>
                                        <td class="theme2"><? echo $personas; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Impuestos</td>
                                        <td class="theme2">$<?php echo number_format(($total * 0.04), 2); ?> MXN</td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-title">
                                    <tr>
                                        <th class="font-weight-bold white">Total</th>
                                        <th class="font-weight-bold white">$<?php echo number_format(($total * 1.04), 2); ?> MXN</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 mb-4">
                    <div class="payment-book">
                        <div class="booking-box">
                            <div class="customer-information mb-4">
                                <h3 class="border-b pb-2 mb-2">Detalles de reserva</h3>
                                <form action="/pago/" method="post">

                                    <input hidden type="text" name="fv" value="<?php echo $fv; ?>">
                                    <input hidden type="text" name="menores" value="<?php echo $menores; ?>">
                                    <input hidden type="text" name="adultos" value="<?php echo $adultos; ?>">
                                    <input hidden type="text" name="tour" value="<?php echo $tour; ?>">

                                    <h5>Completa el formulario</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Nombre completo</label>
                                                <input name="nombre" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Correo electrónico</label>
                                                <input name="email" type="email" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Teléfono</label>
                                                <input name="telefono" type="text" placeholder="">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <label>Comentarios</label>
                                                <textarea name="comentarios" id="" cols="30" rows="10"></textarea>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-2">
                                                <button type="submit" name="submit" value="submit" class="nir-btn float-lg-end w-50">Confirmar Reservar</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
