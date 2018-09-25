<?php
     class VehiculoModel extends Conexion{
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
               $car="SELECT v.*,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado = 1";
               $bajas="SELECT v.*,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado = 0";
               $marcas="SELECT * FROM marca";
               $result=["vehiculos"=> parent::consultaRetorno($car),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "marcas"=> parent::consultaRetorno($marcas)
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT v.*,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $ver_placa=$this->ver_placa();
               if($ver_placa != 0){
                    return "false";
               }else{
                    $date=date("Y-m-d H:i:s");
                    $sql=("INSERT INTO vehiculo(id_marca,tipo,color,placa,age,created_at) VALUES(
                         '{$this->id_marca}','{$this->tipo}','{$this->color}','{$this->placa}','{$this->age}','{$date}')");
                    parent::consultaSimple($sql);
                    return "El Vehiculo se Registro Satisfactoriamente";
               }
          }
          public function editar(){
               $date=date("Y-m-d H:i:s");
               if($this->placa_original==$this->placa){
                    $sql=("UPDATE vehiculo SET id_marca='{$this->id_marca}',tipo='{$this->tipo}',
                         color='{$this->color}',placa='{$this->placa_original}',age='{$this->age}',
                         updated_at='{$date}' WHERE id='{$this->id}'");
               }else{
                    $ver_placa=$this->ver_placa();
                    if($ver_placa != 0){
                         return "false";
                    }else{
                         $sql=("UPDATE vehiculo SET id_marca='{$this->id_marca}',tipo='{$this->tipo}',
                              color='{$this->color}',placa='{$this->placa}',age='{$this->age}',
                              updated_at='{$date}' WHERE id='{$this->id}'");
                    }
               }
               parent::consultaSimple($sql);
               return "El Vehiculo se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE vehiculo SET estado=b'0',baja_detalle='{$this->baja_detalle}'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Vehiculo dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE vehiculo SET estado=b'1',baja_detalle=null
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "Vehiculo dado de ALTA Satisfactoriamente";
          }
          public function ver_placa(){
               $sql="SELECT * FROM vehiculo WHERE placa='{$this->placa}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
