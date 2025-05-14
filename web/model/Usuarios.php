<?php
//Llamamos la conexion
require_once '../../app/models/conexion.php';
//Instancio o creo una clase o objeto
class Usuario{
    //Funcion para consultar a un usuario y logearse
    public function getLoginUsuario(){
        //Instanciamos el objeto
        // y almacenamos dentro de una variable
        $cn = new Conexion();
        $cn->conectar(); //utilizamos el metodo del objeto
        $sql = "SELECT * FROM tb_cliente"; //creamos el script del SQL
        return $cn->getEjecutionQuery($sql); //Obtenemos los datos de la ejecucion
    }
}