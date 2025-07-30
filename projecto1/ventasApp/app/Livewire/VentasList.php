<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venta;

class VentasList extends Component
{
    // Cambiamos la forma de escuchar eventos para Livewire 3
    protected $listeners = ['ventaRealizada' => '$refresh'];

    public function render()
    {
        $ventas = Venta::whereMonth('created_at', now()->month)->get();
        return view('livewire.ventas-list', compact('ventas'));
    }
}
