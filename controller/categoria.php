<?php 

header ('Content-Type: application/json'); //cabecera para aplicaciones tipo JSON

 require_once("../config/conexion.php");
 require_once("../models/Categoria.php");
 $categoria = new Categoria();

 $body = json_decode(file_get_contents("php://input"),true); // recibe toda la info del JSON aqui
 
 //traer información completa de a base de datos.
  switch($_GET["op"]){
  case "GetAll": 
    $datos=$categoria->get_categoria();
    echo json_encode($datos);   
    break;

//traer información  especifica de un id dado por es usuario
    case "GetID":

      $datos=$categoria->get_categoria_x_id($body["cat_id"]);
      echo json_encode($datos);
    
      break;

//insertar información  nombre y observación en la base de datos desde un JSON
    case "Insert":

      $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]);
      echo json_encode("Información insertada correctamente");

      break;

//Actualizar información  nombre y observación en la base de datos desde un JSON

    case "Update":

      $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]);
      echo json_encode( "Información actualizada correctamente");

      break;

//Eliminar información  nombre y observación en la base de datos desde un JSON

    case "Delete":

      $datos=$categoria->delete_categoria($body["cat_id"]);
      echo json_encode( "Información eliminada correctamente");

      break;

      
 }

 

  


?>