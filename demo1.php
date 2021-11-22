<?php include('navegacion.php') ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .recuadro {
            background-color:#ffffcc;
            text-align:left;
            font-family:verdana;
            border-width:0;
            padding:5px;
            border: 1px dotted #ffaa00;
    }
    </style>
  </head>
  <body>

    <div class="container">
        <h2 class="mt-5">Seleccione la fecha:</h2>
        <div id="fecha">
            <a href="back/pagina1.php?fecha=21/01/2016">ver comentarios del 21/01/2016</a><br>
            <a href="back/pagina1.php?fecha=22/01/2016">ver comentarios del 22/01/2016</a><br>
            <a href="back/pagina1.php?fecha=23/01/2016">ver comentarios del 23/01/2016</a><br>
        </div>
        <div class="recuadro" id="comentarios">Comentarios:</div>
        </div>
    </div>





       <script>
      addEventListener('load',inicializarEventos,false);

        function inicializarEventos()
        {
        var ref;
        ref=document.getElementById('fecha');
        var vec=ref.getElementsByTagName('a'); 
        for(f=0;f<vec.length;f++)
        {
            vec[f].addEventListener('click',presionEnlace,false);
        }
        }

        function presionEnlace(e)
        {
        e.preventDefault();
        var url=e.target.getAttribute('href');
        verComentarios(url);     
        }


        var conexion1;
        function verComentarios(url) 
        {
        if(url=='')
        {
            return;
        }
        conexion1=new XMLHttpRequest();
        conexion1.onreadystatechange = procesarEventos;
        conexion1.open("GET", url, true);
        conexion1.send();
        }

        function procesarEventos()
        {
        var detalles = document.getElementById("comentarios");
        if(conexion1.readyState == 4)
        {
            detalles.innerHTML = conexion1.responseText;
        } 
        else 
        {
            detalles.innerHTML = 'Cargando...';
        }
        }


    </script>


</body>
</html>