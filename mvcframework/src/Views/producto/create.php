<form method="post" action="save" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre del producto</label>
    <input type="text" class="form-control" id="nombre" name="nombre"
      <?php if (isset($producto)) echo "value='" . $producto->getNombre() . "'"; ?>
    required>
  </div>

  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad:</label>
    <input type="number" class="form-control" id="cantidad" name="cantidad" min="0"
      <?php if (isset($producto)) echo "value='" . $producto->getCantidad() . "'"; ?>
    required>
  </div>

  <div class="mb-3">
    <label for="precio" class="form-label">Precio del producto:</label>
    <input type="number" step="0.01" min="0" class="form-control" id="precio" name="precio"
      <?php if (isset($producto)) echo "value='" . $producto->getPrecio() . "'"; ?>
    required>
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción:</label>
    <textarea class="form-control" id="descripcion" name="descripcion" required><?php 
      if (isset($producto)) echo $producto->getDescripcion(); 
    ?></textarea>
  </div>

  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen (opcional):</label>
    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
    <?php 
      if (isset($producto) && $producto->getImagen()) {
          echo "<p>Imagen actual: <img src='" . $producto->getImagen() . "' width='100'></p>";
      }
    ?>
  </div>

  <?php
    if (isset($producto)) {
      echo "<input type='hidden' name='id' value='" . $producto->getId() . "'>";
    }
  ?>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
