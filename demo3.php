<?php include('navegacion.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo3</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Demo3  Loading</h2>
        <form action="pagina1.php" method="post" id="formulario">
            Nombre:<input type="text" name="nombre" id="nombre" size="20"><br>
            Comentarios:<br>
            <textarea name="comentarios" id="comentarios" rows="10" cols="50"></textarea><br>
            <input type="submit" value="Enviar" id="enviar">
            <span id="resultados"></span><br>
            <a href="back/comentarios.txt">Ver resultados</a>
    </form>
    </div>
    <script>
        addEventListener('load',inicializarEventos,false);

function inicializarEventos()
{
  var ref=document.getElementById('formulario');
  ref.addEventListener('submit',enviarDatos,false);
}

function enviarDatos(e)
{
  e.preventDefault();
  enviarFormulario();
}


function retornarDatos()
{
  var cad='';
  var nom=document.getElementById('nombre').value;
  var com=document.getElementById('comentarios').value;
  cad='nombre='+encodeURIComponent(nom)+'&comentarios='+encodeURIComponent(com);
  return cad;
}

var conexion1;
function enviarFormulario() 
{
  conexion1=new XMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open('POST','back/pagina3.php', true);
  conexion1.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
  conexion1.send(retornarDatos());  
}

function procesarEventos()
{
  var resultados = document.getElementById("resultados");
  if(conexion1.readyState == 4)
  {
    if (conexion1.status==200)
      resultados.innerHTML = 'Gracias.';
    else
      alert(conexion1.statusText);
  } 
  else 
  {
    resultados.innerHTML = '<img src="img/loading.gif">';
  }
}
    </script>
</body>
</html>