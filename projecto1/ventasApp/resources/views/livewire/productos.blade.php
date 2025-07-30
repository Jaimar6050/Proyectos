<div class="p-4">
    <form wire:submit.prevent="save" class="space-y-4">
        <input wire:model="nombre" placeholder="Nombre" class="border p-2 w-full">
        <input wire:model="cantidad" type="number" placeholder="Cantidad" class="border p-2 w-full">
        <input wire:model="precio" type="number" step="0.01" placeholder="Precio" class="border p-2 w-full">
        <textarea wire:model="descripcion" placeholder="Descripción" class="border p-2 w-full"></textarea>
        <input type="file" wire:model="imagen" class="border p-2 w-full">
        <button class="bg-blue-600 text-white px-4 py-2">Guardar Producto</button>
    </form>

    <h2 class="mt-6 font-bold text-xl">Lista de productos</h2>
    <ul>
        @foreach($productos as $producto)
            <li>{{ $producto->nombre }} - {{ $producto->precio }} Bs</li>
        @endforeach
    </ul>
</div>
