<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class Ventas extends Component
{
    public $nombre_cliente, $producto_id, $cantidad;

    public function realizarVenta()
    {
        $producto = Producto::findOrFail($this->producto_id);

        if ($this->cantidad > $producto->cantidad) {
            session()->flash('error', 'No hay suficiente stock.');
            return;
        }

        $monto = $this->cantidad * $producto->precio;

        Venta::create([
            'nombre_cliente' => $this->nombre_cliente,
            'user_id' => Auth::id(),
            'producto_id' => $producto->id,
            'cantidad' => $this->cantidad,
            'monto' => $monto,
        ]);

        $producto->cantidad -= $this->cantidad;
        $producto->save();

        // Cambiamos emit por dispatch para Livewire 3
        $this->dispatch('ventaRealizada');

        session()->flash('message', 'Venta realizada con éxito.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.ventas', [
            'productos' => Producto::all()
        ]);
    }
}
