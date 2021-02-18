<?php 
session_start();
include_once "encabezado.php";
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;

?>     <div class="row">
<div class="col-lg-5">
    <h1 class="h3 mb-0 text-gray-800">LISTA DE VENTA</h1>
    <br>
    <div class="addScroll">
    <table class="table table-bordered">
			<thead>
				<tr>
			
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
                                  if($i === 0){ 
                                      $totalP = $_SESSION["carrito"][$i];
                                      $granTotal += $totalP;
                                  
                                  }else{
                                     
                                      $producto = $_SESSION["carrito"][$i]["producto"];
                                      $precioVenta = $producto->precioVenta;
                                      $cantidad = $_SESSION["carrito"][$i]["cantidad"];
                                      $totalP = $precioVenta * $cantidad;
                                      ?>
				<tr>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $cantidad?></td>
					<td><?php echo $totalP ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $i?>"><i class="fa fa-trash"></i></a></td>
				</tr>
                                <?php 
                                }} ?>
			</tbody>
		</table>
    
                 
		<h3>Total: <?php echo $granTotal; ?></h3>
		<form action="./terminarVenta.php" method="POST">
                    <input class="form-control" id="cliente" name="cliente" type="text" placeholder="Cliente.." value="">
                    <br>
                    <input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success" >Terminar venta</button>
			<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		</form>
</div>
    </div>
   
    <div class="col-lg-7">
        <br>
                 <input class="form-control border-info" id="buscar" type="text" placeholder="Buscar.."
                        onkeyup="buscarProducto(this.value);">
                 <br>
                 <div class="addScroll" id="productos">
     
         </div>
        </div>
        
    </div>



<script>
$( document ).ready(function() {
      buscarProducto("");
});
</script>
    
<?php include_once "pie.php" ?>