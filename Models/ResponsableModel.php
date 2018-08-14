<?php
     class ResponsableModel extends Conexion{
          private $con;
          function __construct(){
               parent::__construct();
          }
          //["Super Administrador","Administrador","Jefe De Transporte","Responsable"]
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $responsable="SELECT r.*,u.nombre as unidad FROM responsable as r
                    JOIN unidad as u ON u.id = r.id_unidad WHERE r.estado = 1";

               $bajas="SELECT r.*,u.nombre as unidad FROM responsable as r
                    JOIN unidad as u ON u.id = r.id_unidad WHERE r.estado = 0";

               $unidad="SELECT * FROM unidad WHERE estado=b'1'";
               $result=["responsables"=> parent::consultaRetorno($responsable),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "unidades"=> parent::consultaRetorno($unidad)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT r.*,u.nombre as unidad,j.nombre as jefatura FROM responsable as r
                    JOIN unidad as u ON r.id_unidad = u.id
                    JOIN jefatura as j ON u.id_jefatura = j.id
                    WHERE r.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $ver_ci=$this->ver_ci();
               if($ver_ci != 0){
                    return "false";
               }else{
                    $sql=("INSERT INTO responsable(id_unidad,ci,nombre,apellido) VALUES(
                         '{$this->id_unidad}','{$this->ci}','{$this->nombre}','{$this->apellido}')");
                    parent::consultaSimple($sql);
                    return "El Responsable se Registro Satisfactoriamente";
               }
          }
          public function editar(){
               if($this->ci==""){
                    $sql=("UPDATE responsable SET id_unidad='{$this->id_unidad}',nombre='{$this->nombre}',
                         apellido='{$this->apellido}' WHERE id='{$this->id}'");
               }else{
                    $ver_ci=$this->ver_ci();
                    if($ver_ci != 0){
                         return "false";
                    }else{
                         $sql=("UPDATE responsable SET id_unidad='{$this->id_unidad}',ci='{$this->ci}',nombre='{$this->nombre}',
                              apellido='{$this->apellido}' WHERE id='{$this->id}'");
                    }
               }
               parent::consultaSimple($sql);
               return "El Responsable se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE responsable SET estado=0
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Responsable dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE responsable SET estado=1
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Responsable dado de Alta Satisfactoriamente";
          }
          public function ver_ci(){
               $sql="SELECT * FROM responsable WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
