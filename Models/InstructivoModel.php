<?php
     class InstructivoModel extends Conexion{
          private $con;
          function __construct(){
               parent::__construct();
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $persona="SELECT * FROM persona WHERE estado = 1 AND tipo=3";
               $instructivo="SELECT i.*,p.nombre,p.brevet FROM instructivo as i JOIN persona as p ON p.id = i.id_chofer";
               $result=["instructivos"=> parent::consultaRetorno($instructivo),
                         "choferes"=> parent::consultaRetorno($persona)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT i.*,p.nombre FROM instructivo as i  JOIN persona as p ON p.id = i.id_chofer WHERE i.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $sql=("INSERT INTO instructivo(id_chofer,descripcion,fecha,created_at) VALUES(
                    '{$this->id_chofer}','{$this->descripcion}','{$this->fecha}',NOW())");
               parent::consultaSimple($sql);
               return "El Instructivo se Registro Satisfactoriamente";
          }
          public function editar(){
                    $sql=("UPDATE instructivo SET id_chofer='{$this->id_chofer}',descripcion='{$this->descripcion}',
                         fecha='{$this->fecha}',updated_at=NOW() WHERE id='{$this->id}'");
               parent::consultaSimple($sql);
               return "El Instructivo se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="DELETE FROM instructivo WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Instructivo eliminado Satisfactoriamente";
          }
     }
 ?>
