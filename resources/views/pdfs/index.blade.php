<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerando PDF com JS</title>
    <style>
        #dados{
            background: #ff0000;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Gerando PDF com JS</h1>
    <div id="dados">
        <p>Nome: Rogério Feliciano</p>
        <p>Idade: 43 anos</p>
        <p>Sexo: Masculino</p>
        <p>Telefone: 27 99600-9988</p>
    </div>
    <p>
        <button onclick="gerarPDF()">Imprimir</button>
    </p>
    
    <script>
        function gerarPDF(){
            var getData = document.getElementById('dados').innerHTML;
            
            var pdf = window.open('','','with=800,heigth=600');
            pdf.document.write('<html><head>');
            pdf.document.write('<title>PDF</title></head>');
            pdf.document.write('<body>');
            pdf.document.write(getData);
            pdf.document.write('</body></html>');
            pdf.document.close();
            pdf.print();
        }
    </script>
</body>
</html>