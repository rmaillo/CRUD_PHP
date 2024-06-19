<?php

    include "header.php";
    include "conexion.php";

    mysqli_select_db($conexion, "productosbd");
    $productoActualizar = $_GET["id"];
    $seleccionar = "SELECT * FROM productos WHERE id_producto='$productoActualizar'";
    $registros = mysqli_query($conexion, $seleccionar);
    $registro = mysqli_fetch_row($registros);

?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">
            <div class="card">
                <div class="card-header display-6">
                    Actualización de productos
                </div>        
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $productoActualizar;?>&nombreimagen=<?php echo $registro[4]; ?>" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="" class="form-label">Identificador</label>
                                <input type="number" class="form-control" name="identificador" id="identificador" placeholder="Introduce el id" autofocus required value="<?php echo $registro[0]; ?>"/>      
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce el nombre" required value="<?php echo $registro[1]; ?>"/>      
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"><?php echo $registro[2]; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio" placeholder="Introduce el precio" required value="<?php echo $registro[3]; ?>"/>      
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Imagen Antigua</label>
                                <?php echo '<img widht="100px" height="100px" src="imagenes/'.$registro[4].'">'; ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Imagen Nueva</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required />      
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Actualizar">
                            </div>

                        </form>
                    </div>
                </div>
                <a href="actualiza.php"><i class="bi-arrow-return-left px-3" style="font-size: 4rem; color: black"></i></a>
            </div>
        </div>
    </div>
</div>


<?php

    include "footer.php";

?>