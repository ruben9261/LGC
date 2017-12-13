<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/public/css/DocCobroPdf.css">
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
    <p class="centrado">TICKET DE VENTA
      <br>LIMA-PERU
      <br>13/12/2017 02:04 p.m.</p>
    <table>
      <thead>
        <tr>
          <th class="cantidad">CANT</th>
          <th class="producto">PRODUCTO</th>
          <th class="precio">$$</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="cantidad">2.00</td>
          <td class="producto">ARROZ 80 G</td>
          <td class="precio">$10.50</td>
        </tr>
        <tr>
          <td class="cantidad">2.00</td>
          <td class="producto">PAPAS</td>
          <td class="precio">$5.00</td>
        </tr>
        <tr>
          <td class="cantidad">1.00</td>
          <td class="producto">REDBULL</td>
          <td class="precio">$10.00</td>
        </tr>
        <tr>
          <td class="cantidad"></td>
          <td class="producto">TOTAL</td>
          <td class="precio">$41.00</td>
        </tr>
      </tbody>
    </table>
    <p class="centrado">¡GRACIAS POR SU COMPRA!
      <br>crixusbusiness.pe</p>
  </div>
  <button class="oculto-impresion" onclick="imprimir();">Imprimir</button>
</body>

</html>