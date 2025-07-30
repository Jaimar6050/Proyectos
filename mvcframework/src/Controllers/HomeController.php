<?php
namespace App\Controllers;

use App\Controller;
use App\Models\Producto;

class HomeController extends Controller {
    public function index() {
        // Productos con valores por defecto para los parámetros adicionales
        $productos = [
            new Producto("Aceite", 85, 15.99, "Aceite vegetal", null, 1),
            new Producto("Arroz", 180, 8.50, "Arroz extra", null, 2),
            new Producto("Harina", 200, 5.75, "Harina de trigo", null, 3)
        ];

        $this->render('index', ['productos' => $productos]);
    }

    public function dashboard() {
        $this->render('dashboard');
    }
}