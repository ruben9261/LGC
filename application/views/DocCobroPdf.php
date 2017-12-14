<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/public/css/DocCobroPdf.css">
  <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
  <script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>

  <script>
    function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }

  </script>
</head>

<body>
  <div class="ticket">
    <img src="/public/images/umc.jpg" alt="Logotipo">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
               <span>LAZARO GESTIÓN CONTABLE</span>
            </div>
            <div class="col-md-7">
               <span>FECHA: </span>07/02/2017</br>
               <span>HORA: </span> 8:00 AM
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-5">
               <span></span>
            </div>
            <div class="col-md-7">
               <span>N.CUENTA: </span>0000000001</br>
               <span>NRO DE OPERACION: </span> 00001
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-4">
               <span></span>
            </div>
            <div class="col-md-8">
               <span>BOUCHER DE PAGO N°: </span>00001</br>
               <span>ORDEN N°: </span> 00120
            </div>
        </div>
        <span>--------------------------------------------------------------</span>
        <div class="row">
            <div class="col-md-8">
               <span>CLIENTE: </span>00001</br>
               <span>RUC: </span> 00120
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
                    <tr>
                        <td class="col-md-1">2.00</td>
                        <td class="col-md-10">CONSULTAS TRIBUTARIAS - BASICAS:TEMAS FRECUENTES - 20 Minutos</td>
                        <td class="col-md-1">$10.50</td>
                    </tr>
                    <tr>
                        <td class="col-md-1">2.00</td>
                        <td class="col-md-10">PAPAS</td>
                        <td class="col-md-1">$5.00</td>
                    </tr>
                    <tr>
                        <td class="col-md-1">1.00</td>
                        <td class="col-md-10">REDBULL</td>
                        <td class="col-md-1">$10.00</td>
                    </tr>
                    <tr>
                        <td class="col-md-1"></td>
                        <td class="col-md-10">TOTAL</td>
                        <td class="col-md-1">$41.00</td>
                    </tr>
                    </tbody>
                </table>
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
                <span>Pedro Gonzales</span>
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
      <br>crixusbusiness.pe</p>
  </div>
  <button class="oculto-impresion" onclick="imprimir();">Imprimir</button>
</body>

</html>