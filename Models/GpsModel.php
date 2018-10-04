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
                    WHERE (g.fecha BETWEEN '{$this->desde}' AND '{$this->hasta}') GROUP BY g.id_vehiculo ";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $choferes="SELECT id,nombre,brevet FROM persona WHERE estado='1' AND tipo=3";
               $result=["ubicaciones"=> parent::consultaRetorno($ubicaciones),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "choferes"=> parent::consultaRetorno($choferes),
                         "desde"=> $this->desde,"hasta"=>$this->hasta
               ];
               return $result;
          }
          public function ver_gps(){
               $date=date('Y-d-m');
               $locaciones=parent::consultaRetorno("SELECT g.*, CONCAT(p.nombre,' - ',p.brevet) AS nombre FROM gps as g
               JOIN persona as p ON p.id = g.id_chofer WHERE g.id='{$this->id}' LIMIT 1");
               $vehiculo= mysql_fetch_assoc(parent::consultaRetorno("SELECT v.id,v.tipo as nombre,v.placa as document,m.nombre as marca FROM gps as g
                    JOIN vehiculo as v ON v.id=g.id_vehiculo
                    JOIN marca as m ON m.id = v.id_marca
                    WHERE g.id = '{$this->id}' LIMIT 1"));
               $result=["objeto"=> $vehiculo,
                         "locaciones"=> mysql_fetch_assoc($locaciones),
                         "date"=>$date,"mode"=>1
               ];
               return $result;
          }
          public function ver_chofer(){
               $chofer= mysql_fetch_assoc(parent::consultaRetorno("SELECT id,nombre,brevet as document FROM persona  WHERE id = '{$this->id}' LIMIT 1"));
               if ($this->year==null) {
                    $locaciones=mysql_fetch_assoc(parent::consultaRetorno("SELECT g.*, CONCAT(v.tipo,' - ',v.placa) AS nombre FROM gps as g
                         JOIN vehiculo as v ON v.id = g.id_vehiculo WHERE g.id_chofer='{$this->id}' ORDER BY g.id DESC LIMIT 1"));
                    $date=$locaciones["fecha"];
               }else{
                    $locaciones=mysql_fetch_assoc(parent::consultaRetorno("SELECT g.*, CONCAT(v.tipo,' - ',v.placa) AS nombre FROM gps as g
                         JOIN vehiculo as v ON v.id = g.id_vehiculo WHERE g.id_chofer='{$this->id}' AND YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}' AND DAY(g.fecha) ='{$this->day}' LIMIT 1"));
                    $date=$this->year."-".$this->month."-".$this->day;
               }
               $result=["objeto"=> $chofer,
                         "locaciones"=> $locaciones,
                         "date"=>$date,"mode"=>0
               ];
               return $result;
          }
          public function ver_vehiculo(){
               $vehiculo= mysql_fetch_assoc(parent::consultaRetorno("SELECT v.id,v.tipo as nombre,v.placa as document,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.id = '{$this->id}' LIMIT 1"));
               if ($this->year==null) {
                    $locaciones=mysql_fetch_assoc(parent::consultaRetorno("SELECT g.*, CONCAT(p.nombre,' - ',p.brevet) AS nombre FROM gps as g
                    JOIN persona as p ON p.id = g.id_chofer
                    WHERE g.id_vehiculo='{$this->id}' ORDER BY g.id DESC LIMIT 1"));
                    $date=$locaciones["fecha"];
               }else{
                    $locaciones=parent::consultaRetorno("SELECT g.*, CONCAT(p.nombre,' - ',p.brevet) AS nombre FROM gps as g
                    JOIN persona as p ON p.id = g.id_chofer
                    WHERE g.id_vehiculo='{$this->id}' AND YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}' AND DAY(g.fecha) ='{$this->day}' LIMIT 1");
                    $date=$this->year."-".$this->month."-".$this->day;
               }
               $result=["objeto"=> $vehiculo,
                         "locaciones"=> $locaciones,
                         "date"=>$date,"mode"=>1
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
