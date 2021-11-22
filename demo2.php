<?php include('navegacion.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <p>Seleccione el pais
            <h1>Datos de paises.</h1>
            <select id="pais">
                <option value="0" selected>seleccione</option>
                <option value="Argentina">Argentina</option>
                <option value="Brasil">Brasil</option>
                <option value="Chile">Chile</option>
            </select>
        </p>
        <div id="resultados"></div> 
    </div>
    <script>
    addEventListener('load',inicializarEventos,false);

    function inicializarEventos()
    {
    var ob=document.getElementById('pais');
    ob.addEventListener('change',cambioEnSelect,false);
    }

    function cambioEnSelect(e)
    {
    var ob1=document.getElementById('pais');
    recuperarDatos(ob1.value);
    }

    var conexion1;
    function recuperarDatos(pais) 
    {
    conexion1=new XMLHttpRequest();
    conexion1.onreadystatechange = procesarEventos;
    conexion1.open('GET','back/pagina2.php?pa='+pais, true);
    conexion1.send();
    }

    function procesarEventos()
    {
    var resultados = document.getElementById("resultados");

    if(conexion1.readyState == 4)
    {
        var xml = conexion1.responseXML;
        var capital=xml.getElementsByTagName('capital');
        var superficie=xml.getElementsByTagName('superficie');
        var idioma=xml.getElementsByTagName('idioma');
        var poblacion=xml.getElementsByTagName('poblacion');
        resultados.innerHTML='Capital='+capital[0].firstChild.nodeValue + '<br>' +
                            'Superficie='+superficie[0].firstChild.nodeValue + '<br>' +
                            'Idioma='+idioma[0].firstChild.nodeValue + '<br>' +
                            'Poblacion='+poblacion[0].firstChild.nodeValue ;                       
    } 
    else 
    {
        resultados.innerHTML = 'Cargando...';
    }
    }
    </script>

</body>
</html>