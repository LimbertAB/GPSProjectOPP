<?php
     class UsuarioModel extends Conexion{
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
          public function login(){
               $auth="SELECT u.id,u.id_persona,p.tipo,p.nombre,u.password FROM usuario as u
                    JOIN persona as p ON p.id=u.id_persona
                    WHERE u.ci = '{$this->ci}' and p.estado='1'";
               $result= parent::consultaRetorno($auth);
               if(mysql_num_rows($result)==1){
                    $rows= mysql_fetch_assoc($result);
                    if (password_verify($this->password, $rows['password'])){
                         return $rows;
                    }else{
                         return "false";
                    }
               }else{
                    return "false";
               }
          }
          public function listar(){
               $user="SELECT p.nombre,p.id as id_persona,p.tipo,u.ci,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE p.estado = '1'";
               $super="SELECT p.nombre,p.id as id_persona,p.tipo,p.estado,u.ci,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE p.estado = '1' AND p.tipo=0";
               $administrador="SELECT p.nombre,p.id as id_persona,p.tipo,p.estado,u.ci,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE p.estado = '1' AND p.tipo=1";
               $transporte="SELECT p.nombre,p.tipo,p.id as id_persona,p.estado,p.id as id_persona,u.ci,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE p.estado = '1' AND p.tipo=2";
               $bajas="SELECT p.nombre,p.tipo,p.estado,p.id as id_persona,u.ci,u.id FROM usuario as u
                    JOIN persona as p ON u.id_persona = p.id WHERE p.estado = '0'";
               $result=["usuarios"=> parent::consultaRetorno($user),
                         "super"=> parent::consultaRetorno($super),
                         "administrador"=> parent::consultaRetorno($administrador),
                         "transporte"=> parent::consultaRetorno($transporte),
                         "bajas"=> parent::consultaRetorno($bajas)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT p.nombre,p.tipo,p.estado,u.ci,u.id,u.id_persona FROM usuario as u
                    JOIN persona as p ON p.id = u.id_persona
                    WHERE u.id = '{$this->id}' LIMIT 1";
               $resultado = parent::consultaRetorno($sql);
               $row=mysql_fetch_assoc($resultado);
               return $row;
          }
          public function crear(){
               $ver_ci=$this->ver_ci();
               if($ver_ci != 0){
                    return "false";
               }else{
                    $date=date("Y-m-d H:i:s");
                    $sql=("INSERT INTO persona(id_unidad,nombre, tipo, created_at) VALUES(0,'{$this->nombre}','{$this->tipo}','{$date}')");
                    parent::consultaSimple($sql);
                    $id_persona=mysql_insert_id();
                    $sql2=("INSERT INTO usuario(id_persona,ci,password) VALUES(
                         '{$id_persona}','{$this->ci}','{$this->password}')");
                    parent::consultaSimple($sql2);
                    return "El Usuario se Registro Satisfactoriamente";
               }
          }
          public function editar(){
               if($this->ci==""){
                    if($this->password != ""){
                         $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                         $sql=("UPDATE usuario SET password='{$password_insert}' WHERE id='{$this->id}'");
                         parent::consultaSimple($sql);
                    }
               }else{
                    $ver_ci=$this->ver_ci();
                    if($ver_ci != 0){
                         return "false";
                    }else{
                         if($this->password != ""){
                              $password_insert=password_hash($this->password, PASSWORD_BCRYPT);
                              $sql2=("UPDATE usuario SET ci='{$this->ci}',password='{$password_insert}' WHERE id='{$this->id}'");
                         }else{
                              $sql2=("UPDATE usuario SET ci='{$this->ci}' WHERE id='{$this->id}'");
                         }
                         parent::consultaSimple($sql2);
                    }
               }
               $date=date("Y-m-d H:i:s");
               $sql3=("UPDATE persona SET nombre='{$this->nombre}',
                    tipo='{$this->tipo}',
                    updated_at='{$date}' WHERE id='{$this->id_persona}'");
               parent::consultaSimple($sql3);
               return "El Usuario se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE persona SET estado='0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Usuario dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE persona SET estado='1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Usuario dado de ALTA Satisfactoriamente";
          }
          public function ver_ci(){
               $sql="SELECT * FROM usuario WHERE ci='{$this->ci}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
