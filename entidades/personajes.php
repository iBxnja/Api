<?php

class Personaje{
    private $idpersonaje;
    private $nombre;
    private $estado;
    private $historia;
    private $raza;



    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        $sql = "INSERT INTO personajes (
                    nombre,
                    estado,
                    historia,
                    raza
                ) VALUES (
                    '$this->nombre',
                     $this->estado,
                    '$this->historia',
                    '$this->raza'
                );";
        //print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idpersonaje = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE personajes SET
                nombre = '$this->nombre',
                estado = '$this->estado',
                historia =  '$this->historia',
                raza =  '$this->raza'
                WHERE idpersonaje = $this->idpersonaje";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM personajes WHERE idpersonaje = " . $this->idpersonaje;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }


    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idpersonaje,
                    nombre,
                    estado,
                    historia,
                    raza
                FROM personajes";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();

        if($resultado){
            //Convierte el resultado en un array asociativo
            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Personaje();
                $entidadAux->idpersonaje = $fila["idpersonaje"];
                $entidadAux->nombre = $fila["nombre"];
                $entidadAux->estado = $fila["estado"];
                $entidadAux->historia = $fila["historia"];
                $entidadAux->raza = $fila["raza"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }




















}

?>