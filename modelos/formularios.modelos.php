<?php
require_once"conexion.php";

class ModeloFormularios{

 /*--==========================================
Registro
===========================================*/

static public function mdlRegistro($tabla, $datos){

    $stmt  = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombre, Email, Password) 
    VALUES (:Nombre, :Email, :Password)");

    $stmt->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
     $stmt->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
      $stmt->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);


      if ($stmt->execute()) {
      return "ok";

}else{
print_r(Conexion::conectar()->errorInfo());

    }

    $stmt -> Close();

    $stmt = null; 

  }


 /*--==========================================
Registro
===========================================*/


static public function mdlSeleccionarRegistros( $tabla,$item, $valor){


  if ($item == null && $valor == null){

 $stmt  = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM 
     $tabla ORDER BY Id DESC");


     $stmt->execute();
     return $stmt ->fetchAll();

  }else{
    $stmt  = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM 
     $tabla WHERE $item = :$item ORDER BY Id DESC");

         $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);



     $stmt->execute();
     return $stmt ->fetch();

  }


$stmt -> Close();

    $stmt = null; 


  }


}


?>