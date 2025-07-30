<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithFileUploads;

class Productos extends Component
{
    use WithFileUploads;
    public $nombre, $cantidad, $precio, $descripcion, $imagen;
    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'imagen' => 'nullable|image|max:2048',
        ]);
        $imagenPath = $this->imagen ? $this->imagen->store('productos', 'public') : null;
        Producto::create([
            'nombre' => $this->nombre,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'imagen' => $imagenPath,
        ]);
        session()->flash('message', 'Producto creado correctamente.');
        $this->reset();

    }
    public function render()
    {
        return view('livewire.productos', ['productos' => Producto::all()]);
    }
}
