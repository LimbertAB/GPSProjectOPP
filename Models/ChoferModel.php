<?php
     class ChoferModel extends Conexion{
          private $con;
          function __construct(){
               parent::__construct();
          }
          //["Super Administrador","Administrador","Jefe De Transporte","Chofer"]
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $persona="SELECT p.*,u.nombre as unidad FROM persona as p
                    JOIN unidad as u ON u.id = p.id_unidad WHERE p.estado = 1 AND tipo=3";

               $bajas="SELECT p.*,u.nombre as unidad FROM persona as p
                    JOIN unidad as u ON u.id = p.id_unidad WHERE p.estado = 0 AND tipo=3";

               $unidad="SELECT * FROM unidad WHERE estado=b'1'";
               $result=["choferes"=> parent::consultaRetorno($persona),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "unidades"=> parent::consultaRetorno($unidad)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT p.*,u.nombre as unidad,j.nombre as jefatura FROM persona as p
                    JOIN unidad as u ON p.id_unidad = u.id
                    JOIN jefatura as j ON u.id_jefatura = j.id
                    WHERE p.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $ver_brevet=$this->ver_brevet();
               if($ver_brevet != 0){
                    return "false";
               }else{
                    $date=date("Y-m-d H:i:s");
                    $sql=("INSERT INTO persona(id_unidad, nombre,brevet, tipo,created_at) VALUES(
                         '{$this->id_unidad}','{$this->nombre}','{$this->brevet}',3,'{$date}')");
                    parent::consultaSimple($sql);
                    return "El Chofer se Registro Satisfactoriamente";
               }
          }
          public function editar(){
               $date=date("Y-m-d H:i:s");
               if($this->brevet==""){
                    $sql=("UPDATE persona SET id_unidad='{$this->id_unidad}',nombre='{$this->nombre}',
                         tipo='{$this->tipo}',updated_at='{$date}' WHERE id='{$this->id}'");
                    if ($this->tipo==2) {
                         $ver_ci=$this->ver_ci();
                         if($ver_ci != 0){
                              return "ci";
                         }else{
                              $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                              $sql2=("INSERT INTO usuario(id_persona,ci,password) VALUES(
                              '{$this->id}','{$this->ci}','{$password_insert}')");
                              parent::consultaSimple($sql);
                              parent::consultaSimple($sql2);return "El Chofer se Modifico Satisfactoriamente";}
                    }else{parent::consultaSimple($sql);return "El Chofer se Modifico Satisfactoriamente";}
               }else{
                    $ver_brevet=$this->ver_brevet();
                    if($ver_brevet != 0){
                         return "brevet";
                    }else{
                         $sql=("UPDATE persona SET id_unidad='{$this->id_unidad}',nombre='{$this->nombre}',
                              brevet='{$this->brevet}',tipo='{$this->tipo}',updated_at='{$date}' WHERE id='{$this->id}'");
                         if ($this->tipo==2) {
                              $ver_ci=$this->ver_ci();
                              if($ver_ci != 0){
                                   return "ci";
                              }else{
                                   $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                                   $sql2=("INSERT INTO usuario(id_persona,ci,password) VALUES(
                                   '{$this->id}','{$this->ci}','{$password_insert}')");
                                   parent::consultaSimple($sql);
                                   parent::consultaSimple($sql2);return "El Chofer se Modifico Satisfactoriamente";}
                         }else{parent::consultaSimple($sql);return "El Chofer se Modifico Satisfactoriamente";}
                    }
               }

          }
          public function eliminar(){
               $sql="UPDATE persona SET estado='0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Chofer dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE persona SET estado='1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Chofer dado de Alta Satisfactoriamente";
          }
          public function ver_brevet(){
               $sql="SELECT * FROM persona WHERE brevet='{$this->brevet}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
          public function ver_ci(){
               $sql="SELECT * FROM usuario WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
