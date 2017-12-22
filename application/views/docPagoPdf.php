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

<body onload="imprimir();">
    <div id="PDF">
        <div class="ticket">
        <img src="/public/images/umc.jpg" alt="Logotipo">
        <div>
            <div class="">
                <div class="contentLeft">
                <span>LAZARO GESTIÓN CONTABLE</span>
                </div>
                <div class="contentRight">
                <span>FECHA: </span><?php echo $FECHA_PAGO; ?></br>
                <span>HORA: </span> <?php echo $HORA_PAGO; ?>
                </div>
            </div>
            <br/>
            <div class="">
                <div class="contentLeft">
                <span>OFICINA:</span><br/><?php echo $NOMB_OFICINA; ?><br/>
                <span>CAJA:</span><br/><?php echo $Desc_Caja; ?>
                </div>
                <div class="contentRight">
                <?php
                    if($COD_TIPOPAGO != 1){

                        $fecha=explode("-", $FECHA_OPERACION);
                        $dia=$fecha[2];
                        $mes=$fecha[1];
                        $ano=$fecha[0];
                        
                        $FECHA_OPERACION_NEW = "$mes/$dia/$ano";

                        $fila = "";
                        $fila .= '<span>N.CUENTA: </span>'.$NUMERO_CUENTA.'</br>';
                        $fila .= '<span>NRO DE OPERACION: </span>'.$NUMERO_OPERACION.'</br>';
                        $fila .= '<span>FECHA OPERACIÓN: </span>'.$FECHA_OPERACION_NEW;
                        echo $fila;                 
                    }
                ?>
                
                </div>
            </div>
            <br/>
            <div class="">
                <div class="contentLeftDefault">
                <span>BOUCHER DE PAGO N°: </span><?php echo str_pad($COD_DOC_PAGO,6,"0",STR_PAD_LEFT);?></br>
                <span>ORDEN N°: </span> 
                <?php
                        echo $Ordenes;
                ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">         
            <span>--------------------------------------------------------------</span>
            <div class="row">
                <div class="col-md-8">
                <span>PROVEEDOR: </span><?php echo $PROVEEDOR;?></br>
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
                        if(count($docPagoDet)){
                            $fil = "";
                            foreach($docPagoDet as $item){
                                $fil .= "<tr>";
                                $fil .= '<td class="col-md-1">'.$item->CANTIDAD.'</td>';
                                $fil .= '<td class="col-md-10">'.$item->PRODUCTO.'</td>';
                                $fil .= '<td class="col-md-1">'.$item->PRECIO.'</td>';
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
                <?php echo $OBSERVACION; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    EL PRESENTE NO ES VALIDO PARA CREDITO FISCAL
                </div>
            </div>
        </div>
    <br/>
        <p class="centrado">¡GRACIAS POR SU VENTA!
        <br>crixusbusiness.com</p>
    </div>
    </div>

    <div id="editor"></div>
  <!-- <button id="cmd" class="oculto-impresion" onclick="imprimir();">Imprimir</button> -->
  <!-- <button class="btn btn-success" id="Imprimirbtn" onclick="getPDFFileButton();" >Imprimir</button> -->
</body>
</html>