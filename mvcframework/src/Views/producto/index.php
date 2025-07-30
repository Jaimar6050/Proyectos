<table class="table table-bordered table-hover mt-4">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio (Bs)</th>
      <th scope="col">Descripción</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productos as $p): ?>
      <tr>
        <th scope="row"><?= $p->getId() ?></th>
        <td><?= htmlspecialchars($p->getNombre()) ?></td>
        <td><?= $p->getCantidad() ?></td>
        <td><?= number_format($p->getPrecio(), 2) ?></td>
        <td><?= htmlspecialchars($p->getDescripcion()) ?></td>
        <td>
          <?php if ($p->getImagen()): ?>
            <img src="uploads/<?= htmlspecialchars($p->getImagen()) ?>" alt="Imagen del producto" width="60" height="60">
          <?php else: ?>
            <em>Sin imagen</em>
          <?php endif; ?>
        </td>
        <td>
          <div class="d-flex gap-2">
            <form method="POST" action="edit">
              <input type="hidden" name="id" value="<?= $p->getId() ?>">
              <button type="submit" class="btn btn-warning btn-sm">Editar</button>
            </form>
            <form method="POST" action="delete">
              <input type="hidden" name="id" value="<?= $p->getId() ?>">
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
