
$(document).ready(function() {
  // Almacenamos el valor de $admin en sessionStorage
  var admin = document.getElementById('myElement').getAttribute('data-admin');
  if (admin) { //Comprueba que exista la variable admin
      alert('WORKS');
    if (admin === 'false') {
      $('#hist').change(function() {
        var hist = $(this).val(); 
        updateElement('departamento', hist, 'controllers/departamento.php');
        updateElement('equipo', hist, 'controllers/equipo.php');
        updateElement('usuario', hist, 'controllers/usuario_equipo.php');
        updateElement('correo', hist, 'controllers/usuario_equipo.php');
      });
    } else{
      alert('WORKS');
      $('#equipo').change(function() {
        var hist = $(this).val(); 
        updateElement('usuario', hist, 'controllers/usuario_equipo.php');
        updateElement('correo', hist, 'controllers/usuario_equipo.php');
      });
    }
  }
});

function updateElement(elemento, valor, url) {
    
  switch (elemento) {
    case 'departamento':
      data = { departamento: valor };break;
    case 'equipo':
      data = { equipo: valor };break;
    case 'usuario':
      data = { usuario: valor };break;
    case 'correo':
      data = { correo: valor };break;
    default:
      data = { departamento: valor };break;
  }
  
  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    success: function(response) {
        $('#' + elemento).val(response);
    },
    error: function(xhr, textStatus, errorThrown) {
        alert('Error: ' + errorThrown);
    }
  });
}