<?php
    session_start();
    if(isset($_POST)){
      
    }
    include('header.php');
?>
<br><br>
<body>
  <div class="container">
    <h1>Mantenimiento</h1> <hr/> <br/>
    <form>
      <div class="row">
        <!-- Columna 1 -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="departamento" class="form-label">Departamento</label>
            <select class="form-select" id="departamento">
              <option selected>Seleccione una opción</option>
              <option value="departamento1">Departamento 1</option>
              <option value="departamento2">Departamento 2</option>
              <option value="departamento3">Departamento 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="maquina" class="form-label">Máquina</label>
            <select class="form-select" id="maquina">
              <option selected>Seleccione una opción</option>
              <option value="maquina1">Máquina 1</option>
              <option value="maquina2">Máquina 2</option>
              <option value="maquina3">Máquina 3</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
          </div>
        </div>

        <!-- Columna 2 -->
        <div class="col-md-6">
          <div class="mb-3">
            <label for="fecha-mtto" class="form-label">Fecha de mantenimiento</label>
            <input type="date" class="form-control" id="fecha-mtto">
          </div>
          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" name="observaciones" id="observaciones" rows="5" style="height: 100px; white-space: pre-wrap;"></textarea>
              <label for="observaciones">Observaciones</label>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-floating">
              <textarea class="form-control" name="herramientas" id="herramientas" rows="5" style="height: 100px; white-space: pre-wrap;"></textarea>
              <label for="herramientas">Herramientas utilizadas</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</body>
<?php
    session_start();
    include('footer.php');
?>