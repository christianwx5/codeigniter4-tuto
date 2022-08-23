<?=$cabecera;?>


<?php 

    // print_r($libro);

?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Editar datos del libro</h5>
        <p class="card-text">

        <form method="post" action="<?=site_url("/actualizar");?>" enctype="multipart/form-data">
            
            <input id="id" class="form-control" type="text" name="id" value="<?php echo $libro['id']; ?>">
        
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $libro['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen: </label>
                <br />
                <img class="img-thumbnail" src="<?=base_url()?>/uploads/<?=$libro['imagen'];?>" width="100"  alt="">
                <br />
                <input id="imagen" class="form-control-file" type="file" name="imagen">
                <br />
            </div>

            <button class="btn btn-success" type="submit">Guardar</button>
            
        </form>


        </p>
    </div>
</div>

<?=$pie;?>