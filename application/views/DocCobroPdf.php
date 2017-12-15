<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/public/css/DocCobroPdf.css">
  <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
  <script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script type="text/javascript" src="/public/custom/DocCobroPdf.js"></script>
</head>

<body>
    <div id="PDF">
        <div class="ticket">
        <img src="/public/images/umc.jpg" alt="Logotipo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                <span>LAZARO GESTIÓN CONTABLE</span>
                </div>
                <div class="col-md-7">
                <span>FECHA: </span><?php echo $FECHA_COBRO; ?></br>
                <span>HORA: </span> <?php echo $HORA_COBRO; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    UNO
                </div>
                <div class="col-md-4">
                    DOS
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4">
                <span>OFICINA:</span><br/><?php echo $NOMB_OFICINA; ?>
                <span>CAJA:</span><br/><?php echo $Desc_Caja; ?>
                </div>
                <div class="col-md-8">
                <span>N.CUENTA: </span><?php echo $NUMERO_CUENTA;?></br>
                <span>NRO DE OPERACION: </span> <?php echo $NUMERO_OPERACION; ?>
                <span>FECHA OPERACIÓN: </span> <?php echo $FECHA_OPERACION; ?>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4">
                <span></span>
                </div>
                <div class="col-md-8">
                <span>BOUCHER DE PAGO N°: </span><?php echo $COD_DOC_COBRO; ?></br>
                <span>ORDEN N°: </span> 
                <?php
                        echo $Ordenes;
                ?>
                </div>
            </div>
            <span>--------------------------------------------------------------</span>
            <div class="row">
                <div class="col-md-8">
                <span>CLIENTE: </span><?php echo $CLIENTE;?></br>
                <span>N° DOC: </span> <?php echo $DOCUMENTO;?>
                </div>
            </div>
            <span>--------------------------------------------------------------</span>
            <div class"row">
                <div class="col-md-12">
                    <table>
                        <thead>
                        <tr>
                            <th class="col-md-1">CANT</th>
                            <th class="col-md-10">PRODUCTO</th>
                            <th class="col-md-1">$$</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(count($docCobroDet)){
                            $fil = "";
                            foreach($docCobroDet as $item){
                                $fil .= "<tr>";
                                $fil .= '<td class="col-md-1">'.$item->Cantidad.'</td>';
                                $fil .= '<td class="col-md-10">'.$item->Producto.'</td>';
                                $fil .= '<td class="col-md-1">'.$item->Precio.'</td>';
                                $fil .= "</tr>";
                            }
                            echo $fil;
                        } 
                        ?>
                        <tr>
                            <td class="col-md-1"></td>
                            <td class="col-md-10">TOTAL</td>
                            <td class="col-md-1"><?php echo $importeTotal; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span>SON:</span> <?php echo $importeEnLetras; ?>
                </div>
            </div>
            <span>--------------------------------------------------------------</span>
            <br/><br/><br/>
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <span>----------------------</span><br/>
                    <span>CONFORMIDAD</span>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-10">
                    <span>ATENDIDO POR:</span>
                    <span><?php echo $Nom_Usu; ?></span>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                LE RECORDAMOS QUE EL PLAZO DE RECEPCION 
                DE DOCUMENTOS SIN RECARGOS ES HASTA EL
                DIA 10 DE CADA MES. 
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    EL PRESENTE NO ES VALIDO PARA CREDITO FISCAL
                </div>
            </div>
        </div>
    <br/>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        <br>crixusbusiness.com</p>
    </div>
    </div>

    <div id="editor"></div>
  <!-- <button id="cmd" class="oculto-impresion" onclick="imprimir();">Imprimir</button> -->
  <button class="btn btn-success" id="Imprimirbtn" onclick="genPDF();" >Imprimir</button>
</body>
</html>