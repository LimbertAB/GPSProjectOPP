<?php
     class CronogramaModel extends Conexion{
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
               $cronograma="SELECT i.*,p.nombre as marca FROM cronograma as i JOIN persona as p ON p.id = i.id_chofer";
               $result=["cronogramas"=> parent::consultaRetorno($cronograma),
                         "choferes"=> parent::consultaRetorno($persona)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT i.*,m.nombre as marca FROM cronograma as i JOIN marca as m ON m.id = i.id_marca WHERE i.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $ver_placa=$this->ver_placa();
               if($ver_placa != 0){
                    return "false";
               }else{
                    $date=date("Y-m-d H:i:s");
                    $sql=("INSERT INTO cronograma(id_marca,tipo,color,placa,age,created_at) VALUES(
                         '{$this->id_marca}','{$this->tipo}','{$this->color}','{$this->placa}','{$this->age}','{$date}')");
                    parent::consultaSimple($sql);
                    return "El Cronograma se Registro Satisfactoriamente";
               }
          }
          public function editar(){
               $date=date("Y-m-d H:i:s");
               if($this->placa_original==$this->placa){
                    $sql=("UPDATE cronograma SET id_marca='{$this->id_marca}',tipo='{$this->tipo}',
                         color='{$this->color}',placa='{$this->placa_original}',age='{$this->age}',
                         updated_at='{$date}' WHERE id='{$this->id}'");
               }else{
                    $ver_placa=$this->ver_placa();
                    if($ver_placa != 0){
                         return "false";
                    }else{
                         $sql=("UPDATE cronograma SET id_marca='{$this->id_marca}',tipo='{$this->tipo}',
                              color='{$this->color}',placa='{$this->placa}',age='{$this->age}',
                              updated_at='{$date}' WHERE id='{$this->id}'");
                    }
               }
               parent::consultaSimple($sql);
               return "El Cronograma se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE cronograma SET estado=b'0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Cronograma dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE cronograma SET estado=b'1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Cronograma dado de ALTA Satisfactoriamente";
          }
          public function ver_placa(){
               $sql="SELECT * FROM cronograma WHERE placa='{$this->placa}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
