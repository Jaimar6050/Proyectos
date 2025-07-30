<ul>
    @foreach($ventas as $venta)
        <li>
            Cliente: {{ $venta->nombre_cliente }} | Producto: {{ $venta->producto->nombre }} |
            Cantidad: {{ $venta->cantidad }} | Monto: Bs {{ $venta->monto }}
        </li>
    @endforeach
</ul>
