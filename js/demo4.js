addEventListener('load',inicializarEventos,false);

function inicializarEventos()
{
  var ob=document.getElementById('boton1');
  ob.addEventListener('click',presionBoton,false);
}

function presionBoton(e)
{
  var cadena='{ "nombre":"Gonzalez luis",' +
             '  "fechanac":"23/12/1968",' +
             '  "dni":"20546789",' +
             '  "sueldos":[1880,1900,2130]' +
             ' }';
  var empleado=JSON.parse(cadena);
  alert('Nombre:'+empleado.nombre);
  alert('Fecha de nacimiento:'+empleado.fechanac);
  alert('DNI:'+empleado.dni);
  alert('Sueldo 1:'+empleado.sueldos[0]);
  alert('Sueldo 2:'+empleado.sueldos[1]);
  alert('Sueldo 3:'+empleado.sueldos[2]);
}