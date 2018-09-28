<?php
     class ConfiguracionModel extends Conexion{
          function __construct(){
               parent::__construct();
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar_marca(){
               $marca="SELECT * FROM marca WHERE estado = 1 ";
               $baja="SELECT * FROM marca WHERE estado = 0";
               $result=["marcas"=>parent::consultaRetorno($marca),
                         "bajas"=>parent::consultaRetorno($baja),
               ];
               return $result;
          }
          public function crear_marca(){
               $ver_marca=$this->ver_marca();
               if($ver_marca != 0){
                    echo "false";
               }else{
                    $sql=("INSERT INTO marca(nombre) VALUES('{$this->nombre}')");
                    parent::consultaSimple($sql);
                    echo "El Cargo se Registro Satisfactoriamente";
               }
          }
          public function editar_marca(){
               $ver_marca=$this->ver_marca();
               if($ver_marca != 0){
                    echo "false";
               }else{
                    $sql=("UPDATE marca SET nombre='{$this->nombre}' WHERE id='{$this->id}' ");
                    parent::consultaSimple($sql);
                    echo "El Cargo se Modifico Satisfactoriamente";
               }
          }
          public function baja_marca(){
               $sql="UPDATE marca SET estado=0 WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "El Cargo se dio de Baja Satisfactoriamente";
          }
          public function alta_marca(){
               $sql="UPDATE marca SET estado=1 WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "El Cargo se dio de Alta Satisfactoriamente";
          }
          public function ver_marca(){
               $sql2="SELECT * FROM marca WHERE nombre='{$this->nombre}'";
               $resultado=parent::consultaRetorno($sql2);
               return mysql_num_rows($resultado);
          }
     }
 ?>
