<?php

class ControladorFormularios{

/*--==========================================
Registro
===========================================*/

public function ctrRegistro(){

     if(isset($_POST["registroNombre"])){

        $tabla = "registro";

        $datos = array("Nombre" => $_POST["registroNombre"],
                       "Email" => $_POST["registroEmail"],
                       "Password" => $_POST["registroPassword"]);

        $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

        return $respuesta;
        

         



         }

    }


/*--==========================================
Registro
===========================================*/

static public function ctrlSeleccionarRegistros(){

     $tabla = "registro";

     $respuesta = ModeloFormularios::mdlSeleccionarRegistros( $tabla, null, null);

     return $respuesta;
}



/*--==========================================
INGRESO
===========================================*/


public function ctrlIngreso(){

     if(isset($_POST["ingresoEmail"])){

          $tabla = "registro";
          $item = "email";
          $valor = $_POST["ingresoEmail"];

         
          $respuesta = ModeloFormularios::mdlSeleccionarRegistros( $tabla, $item, $valor);


         if ($respuesta["Email"] == $_POST["ingresoEmail"] &&  $respuesta["Password"] ==
          $_POST["ingresoPassword"]) {

         $_SESSION["validarIngreso"] = "ok"; 



 echo '<script> 

          if ( window,history.replaceState ) {
           window,history.replaceState( null, null, window.location.href );

               }

               window.location = "index.php?pagina=inicio";

             </script>';

   

         }else{

         echo '<script> 

          if ( window,history.replaceState ) {
           window,history.replaceState( null, null, window.location.href );

               }

             </script>';
              echo '<div class="alert alert-danger">Error al ingresar, el email o la contraseña no considen</div>';


         }
         
          echo '<pre>'; print_r($respuesta); echo '</pre>';

     }
}



}



?>