<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Panel</h2>
    </x-slot>

    <div class="py-6 px-4">
        <h3 class="text-lg font-bold mb-2">Ventas del mes</h3>

        <!-- Reemplazamos la lista estática por el componente Livewire -->
        @livewire('ventas-list')

        <hr class="my-4">

        <!-- Mantenemos el componente del formulario de ventas -->
        @livewire('ventas')
    </div>
</x-app-layout>
