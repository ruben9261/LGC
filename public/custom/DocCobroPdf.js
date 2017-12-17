    function imprimir() {
        if (window.print) {
            window.print();
        } else {
            alert("La función de impresion no esta soportada por su navegador.");
        }
    }

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

function getPDFFileButton () {
    
    // Select which div with id that need to be printed
    // to print body $('body')
    // here printing div with content id $("#content")
    // using html canvas to save as required pdf to image to preserve css
    return html2canvas($('body'), {
        background: "#ffffff",
        onrendered: function(canvas) {
            var myImage = canvas.toDataURL("image/jpeg,1.0");
            // Adjust width and height
            var imgWidth = (canvas.width * 20) / 240;
            var imgHeight = (canvas.height * 20) / 240; 
            // jspdf changes
            var pdf = new jsPDF('p', 'mm', 'a4');
            pdf.addImage(myImage, 'JPEG', 15, 2, imgWidth, imgHeight); // 2: 19
            pdf.save('Download.pdf');
        }
    });
}       

// C:/xampp/htdocs/Proyectos/WS_SLGC_20171116/SLGC
// C:/xampp/htdocs/Proyectos/PDF