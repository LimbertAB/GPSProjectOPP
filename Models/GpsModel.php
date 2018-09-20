<?php
     class GpsModel extends Conexion{
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
               $ubicaciones="SELECT g.*,v.tipo,v.placa,p.nombre,p.brevet FROM gps as g
                    JOIN vehiculo as v ON v.id=g.id_vehiculo
                    JOIN persona as p ON p.id=g.id_chofer
                    WHERE YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}' AND DAY(g.fecha) ='{$this->day}' GROUP BY g.id_vehiculo ";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $choferes="SELECT id,nombre,brevet FROM persona WHERE estado='1' AND tipo=3";
               $result=["ubicaciones"=> parent::consultaRetorno($ubicaciones),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "choferes"=> parent::consultaRetorno($choferes),
                         "month"=>$this->month,"year"=>$this->year,"day"=>$this->day,
                         "date"=>$this->year."-".$this->month."-".$this->day,
               ];
               return $result;
          }
          public function ver_chofer(){
               $chofer= mysql_fetch_assoc(parent::consultaRetorno("SELECT id,nombre,brevet as document FROM persona  WHERE id = '{$this->id}' LIMIT 1"));
               $locaciones=mysql_fetch_assoc(parent::consultaRetorno("SELECT g.*, CONCAT(v.tipo,' - ',v.placa) AS nombre FROM gps as g
                    JOIN vehiculo as v ON v.id = g.id_vehiculo WHERE g.id_chofer='{$this->id}' AND YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}'AND DAY(g.fecha) ='{$this->day}' LIMIT 1"));
               $result=["objeto"=> $chofer,
                         "locaciones"=> $locaciones,
                         "date"=>$this->year."-".$this->month."-".$this->day,"mode"=>0
               ];
               return $result;
          }
          public function ver_vehiculo(){
               $vehiculo= mysql_fetch_assoc(parent::consultaRetorno("SELECT v.id,v.tipo as nombre,v.placa as document,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.id = '{$this->id}' LIMIT 1"));
               $locaciones=parent::consultaRetorno("SELECT g.*, CONCAT(p.nombre,' - ',p.brevet) AS nombre FROM gps as g
               JOIN persona as p ON p.id = g.id_chofer
               WHERE g.id_vehiculo='{$this->id}' AND YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}' AND DAY(g.fecha) ='{$this->day}' LIMIT 1");
               $result=["objeto"=> $vehiculo,
                         "locaciones"=> mysql_fetch_assoc($locaciones),
                         "date"=>$this->year."-".$this->month."-".$this->day,"mode"=>1
               ];
               return $result;
          }
          public function crear(){
               $sql=("INSERT INTO gps(id_chofer,id_vehiculo,descripcion,filename,fecha) VALUES(
                    '{$this->id_chofer}','{$this->id_vehiculo}','{$this->descripcion}','{$this->filename}','{$this->fecha}')");
               parent::consultaSimple($sql);
               return "La Coordenadas se Registraron Satisfactoriamente";
          }

          public function imprimir(){
               $ubicaciones=parent::consultaRetorno("SELECT g.*,CONCAT(v.tipo,' (',v.placa,')') as vehiculo,CONCAT(p.nombre,' (',p.brevet,')') as chofer FROM gps as g
                    JOIN vehiculo as v ON v.id=g.id_vehiculo
                    JOIN persona as p ON p.id=g.id_chofer
                    WHERE g.id='{$this->id}' ");
               $data=mysql_fetch_assoc($ubicaciones);
               return $data;
          }
     }
 ?>
