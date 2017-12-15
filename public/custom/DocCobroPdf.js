// function imprimir() {
//     if (window.print) {
//         window.print();
//     } else {
//         alert("La función de impresion no esta soportada por su navegador.");
//     }
// }

    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

function clickBoton(){
    debugger;
    var doc = new jsPDF();
    //alert("hola mundo");
    var pdf = $('#PDF').html();
    doc.fromHTML(pdf, 15, 15, {
        'width': 300,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');

    
};

function genPDF(){
    debugger;
    // html2canvas(
    //     document.body,{
    //         onredered: function(canvas){
                
    //             var img = canvas.toDataURL("image/png");
    //             var doc = new jsPDF();
    //             doc.addImage(img,'JPEG',300,300);
    //             doc.save('test.pdf');
    //         }
    //     }
    // );
    var pdf = new jsPDF('p','pt','a4');
    
    pdf.addHTML(document.body,function() {
        pdf.output('datauri');
    });
};