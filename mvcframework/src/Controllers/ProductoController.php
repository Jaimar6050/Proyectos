<?php
namespace App\Controllers;

use App\Controller;
use App\Models\Producto;
use App\Util\DatabaseConn;

class ProductoController extends Controller {
    public function index() {
        $productos = [];
        $db = DatabaseConn::getConn();
        $rs = $db->query('SELECT * FROM productos');
        foreach($rs as $prod) {
            $productos[] = new Producto(
                $prod->nombre,
                $prod->cantidad,
                $prod->precio,
                $prod->descripcion,
                $prod->imagen ?? null,
                $prod->id
            );
        }
        $this->render('producto/index', ['productos' => $productos]);
    }

    public function create() {
        $this->render('producto/create');
    }

    public function save() {
        $nombre = $_POST['nombre'] ?? '';
        $cantidad = $_POST['cantidad'] ?? 0;
        $precio = $_POST['precio'] ?? 0.0;
        $descripcion = $_POST['descripcion'] ?? '';
        $imagen = $_FILES['imagen']['name'] ?? null;
        $id = $_POST['id'] ?? null;

        // Guardar imagen si existe
        if ($imagen) {
            $rutaTemporal = $_FILES['imagen']['tmp_name'];
            $rutaDestino = 'uploads/' . basename($imagen);
            move_uploaded_file($rutaTemporal, $rutaDestino);
        } else {
            $rutaDestino = null;
        }

        $db = DatabaseConn::getConn();

        if ($id) {
            $p = new Producto($nombre, $cantidad, $precio, $descripcion, $rutaDestino, $id);

            $db->query('UPDATE productos SET ? WHERE id = ?', [
                'nombre' => $p->getNombre(),
                'cantidad' => $p->getCantidad(),
                'precio' => $p->getPrecio(),
                'descripcion' => $p->getDescripcion(),
                'imagen' => $p->getImagen()
            ], $p->getId());

            $data = ['resultado' => 'ACTUALIZADO', 'producto' => $p];
        } else {
            $p = new Producto($nombre, $cantidad, $precio, $descripcion, $rutaDestino);

            $db->query('INSERT INTO productos ?', [
                'nombre' => $p->getNombre(),
                'cantidad' => $p->getCantidad(),
                'precio' => $p->getPrecio(),
                'descripcion' => $p->getDescripcion(),
                'imagen' => $p->getImagen()
            ]);

            $p->setId($db->getInsertId());
            $data = ['resultado' => 'INSERTADO', 'producto' => $p];
        }

        $this->render('producto/save', ['data' => $data]);
    }

    public function delete() {
        $id = $_POST['id'];
        $db = DatabaseConn::getConn();
        $total = $db->query('DELETE FROM public.productos WHERE id = ?', $id)->getRowCount();
        $data = ($total == 1)
            ? ['resultado' => 'ELIMINADO']
            : ['resultado' => 'NO ELIMINADO, ID INCORRECTO'];
        $this->render('producto/delete', ['data' => $data]);
    }

    public function edit() {
        $id = $_POST['id'];
        $db = DatabaseConn::getConn();
        $rs = $db->query('SELECT * FROM public.productos WHERE id = ?', $id);
        $prod = $rs->fetch();

        $p = new Producto(
            $prod['nombre'],
            $prod['cantidad'],
            $prod['precio'],
            $prod['descripcion'],
            $prod['imagen'] ?? null,
            $prod['id']
        );

        $this->render('producto/create', ['producto' => $p]);
    }
}
