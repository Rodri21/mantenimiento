
$(document).ready(function() {
  var admin = document.getElementById('myElement').getAttribute('data-admin');
  if (admin) { 
    if (admin === 'false') { //SIENDO ENCARGADO
        var hist = $('#hist').val(); 
        updateData('encargado', hist)
      $('#hist').change(function() {
        var hist = $(this).val(); 
        updateData('encargado', hist)
      });
    } else{ //SIENDO ADMIN
      var equipo = $('#equipo').val(); 
      updateData('admin', equipo)
      $('#equipo').change(function() {
        var equipo = $(this).val(); 
        updateData('admin', equipo)
      });
      $('#guardar').click(function() {
        alert("Registro guardado");
      });
    }
  }
});

function updateData(rol, id) {
  if (rol=='admin') {
    updateElement('usuario', id, 'encargado', '../controllers/propietario.php');
    updateElement('correo', id, 'encargado','../controllers/propietario.php');
  } else{
    updateElement('departamento', id, 'admin','controllers/departamento.php');
    updateElement('equipo', id, 'admin','controllers/equipo.php');
    updateElement('usuario', id, 'admin','controllers/propietario.php');
    updateElement('correo', id, 'admin','controllers/propietario.php');
  }
}

function updateElement(elemento, valor, rol, url) {
    
    switch (elemento) {
        case 'departamento':
          data = { departamento: valor, rol: rol };break;
        case 'equipo':
          data = { equipo: valor, rol: rol };break;
        case 'usuario':
          data = { usuario: valor, rol: rol };break;
        case 'correo':
          data = { correo: valor, rol: rol };break;
        default:
          data = { departamento: valor, rol: rol };break;
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