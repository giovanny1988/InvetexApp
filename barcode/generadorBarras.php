<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar código de barras</title>
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar codigo de barras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="../barcode/generar.php" target="_blank" method="post">
            <div class="mb-2">
            <select class="form-select" name="codigo">
                <option>Referencia</option>
                <?php
                    include("../controlador/listar_insumos.php");
                    while($datos=mysqli_fetch_array($query))
                    { 
                ?> 
                      <option value="<?php echo $datos['referencia'] . " : " . $datos['nombre_insumo']?>"><?php echo $datos['referencia'] ." : ". $datos['nombre_insumo']?></option>                   
                     <?php }    
                    ?>  
              </select>      
            </div>
              <input class="btn btn-primary" type="submit" value="Generar">
          </form>      
        </div>
    </div>
  </div>
</div>
</body>
</html>