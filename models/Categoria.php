<?php

//traer información completa de a base de datos.
class Categoria extends Conectar{
    public function get_categoria(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_categoria where estado = 1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//traer información  especifica de un id dado por es usuario

    public function get_categoria_x_id($cat_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM tm_categoria where estado = 1 AND cat_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
//insertar información  nombre y observación en la base de datos desde un JSON
    public function insert_categoria($cat_nom,$cat_obs){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="INSERT INTO tm_categoria (cat_id,cat_nom,cat_obs,estado)VALUES (NULL,?,?,'1')";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $cat_nom);
    $sql->bindValue(2, $cat_obs);
    $sql->execute();
    return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

//Actualizar información  nombre y observación en la base de datos desde un JSON
    public function update_categoria($cat_id,$cat_nom,$cat_obs){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE tm_categoria SET cat_nom = ?,cat_obs= ? WHERE cat_id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

//Eliminar información  nombre y observación en la base de datos desde un JSON
    public function delete_categoria($cat_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM tm_categoria WHERE cat_id = ?;";
        //$sql="UPDATE tm_categoria SET estado = '0' WHERE id = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    

 }
?>