<div class="p-4">
    <form wire:submit.prevent="realizarVenta" class="space-y-4">
        <input wire:model="nombre_cliente" placeholder="Nombre del Cliente" class="border p-2 w-full">
        <select wire:model="producto_id" class="border p-2 w-full">
            <option value="">-- Selecciona un producto --</option>
            @foreach($productos as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }} ({{ $p->cantidad }} disponibles)</option>
            @endforeach
        </select>
        <input wire:model="cantidad" type="number" placeholder="Cantidad" class="border p-2 w-full">
        <button class="bg-green-600 text-whit px-4 py-2">Vender</button>
    </form>
</div>
