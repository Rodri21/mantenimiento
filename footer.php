<br><hr>

<footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5 class="mb-3">Integrantes del equipo</h5>
        <ul class="list-unstyled">
          <li>Nombre del integrante 1</li>
          <li>Nombre del integrante 2</li>
          <li>Nombre del integrante 3</li>
          <li>Nombre del integrante 4</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h5 class="mb-3">Materia</h5>
        <p>Programación lógica y funcional</p>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {
    // Almacenamos el valor de $admin en sessionStorage
    var admin = document.getElementById('myElement').getAttribute('data-admin');
    if (admin) { //Comprueba que exista la variable admin
      if (admin === 'false') {
        $('#hist').change(function() {
          var hist = $(this).val(); 
          updateElement('departamento', hist, 'controllers/departamento.php');
          updateElement('equipo', hist, 'controllers/equipo.php');
          updateElement('usuario', hist, 'controllers/usuario_equipo.php');
          updateElement('correo', hist, 'controllers/usuario_equipo.php');
        });
      } else{
        $('#equipo').change(function() {
          var hist = $(this).val(); 
          updateElement('usuario', hist, '../controllers/usuario_equipo.php');
          updateElement('correo', hist, '../controllers/usuario_equipo.php');
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
</script>