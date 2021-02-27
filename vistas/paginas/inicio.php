<?php

if(!isset($_SESSION["validarIngreso"])){

 echo '<script> window.location = "index.php?pagina=ingreso";</script>';
return;

    
}else {

    
if($_SESSION["validarIngreso"] != "ok"){

    echo '<script> window.location = "index.php?pagina=ingreso";</script>';
    return;

    
    }
     
}



$usuarios = ControladorFormularios::ctrlSeleccionarRegistros();



?>
<table class="table-borderless table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>


<?php foreach ($usuarios as $key => $value):?>
 <tr>

             <td><?php echo ($key+1);?></td>
            <td><?php echo $value["Nombre"]; ?></td>
            <td><?php echo $value["Email"]; ?></td>
            <td><?php echo $value["Fecha"]; ?></td>
           <td>
           <div class="btn-group">
            
            <button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

            
            </div>
           
           </td>

            
        </tr>


<?php endforeach ?>





       
    </tbody>
</table>