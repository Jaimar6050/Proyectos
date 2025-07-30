<link rel="icon" href="https://windows.php.net/favicon.ico" type="image/x-icon" />
<?php
echo '<h1>Lista de Productos</h1>';
//var_dump($productos);
foreach($productos as $p){
  echo "Producto: ".$p->getNombre().", Precio:".$p->getPrecio()."<br>";
}
