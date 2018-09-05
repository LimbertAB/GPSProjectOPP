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
               $ubicaciones="SELECT g.id_vehiculo,count(*) as total,v.tipo FROM gps as g
                    JOIN vehiculo as v ON v.id=g.id_vehiculo
                    WHERE YEAR(g.fecha) = '{$this->year}' AND MONTH(g.fecha) ='{$this->month}' AND DAY(g.fecha) ='{$this->day}' GROUP BY g.id_vehiculo ";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $result=["ubicaciones"=> parent::consultaRetorno($ubicaciones),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "month"=>$this->month,"year"=>$this->year,"day"=>$this->day
               ];
               return $result;
          }
          public function viaje(){
               $viajes="SELECT g.id_chofer,count(*) as total,p.nombre FROM boleta as g
                    JOIN persona as p ON p.id=g.id_chofer
                    WHERE YEAR(g.fecha_de) = '{$this->year}' AND MONTH(g.fecha_de) ='{$this->month}' GROUP BY g.id_chofer ";
               $result=["todos"=> parent::consultaRetorno($viajes),
                         "month"=>$this->month,"year"=>$this->year
               ];
               return $result;
          }
          public function imprimir_uno(){
               $chofer="SELECT * FROM persona WHERE id='{$this->id}' LIMIT 1";
               $viajes="SELECT g.*,v.tipo as vehiculo,m.nombre as marca FROM boleta as g
                    JOIN vehiculo as v ON v.id=g.id_vehiculo
                    JOIN marca as m ON m.id=v.id_marca
                    WHERE YEAR(g.fecha_de) = '{$this->year}' AND MONTH(g.fecha_de) ='{$this->month}' AND g.id_chofer='{$this->id}' ";
               $result=["chofer"=> mysql_fetch_assoc(parent::consultaRetorno($chofer)),
                         "viajes"=> parent::consultaRetorno($viajes),
                         "month"=>$this->month,"year"=>$this->year
               ];
               return $result;
          }
          public function ver(){
               $boletas="SELECT g.*,p.id as id_chofer,p.nombre,p.brevet,v.id as id_vehiculo,v.color,v.placa,v.tipo,m.nombre as marca FROM boleta as g
                    JOIN persona as p ON p.id = g.id_chofer
                    JOIN vehiculo as v ON v.id = g.id_vehiculo JOIN marca as m ON m.id = v.id_marca WHERE g.id = '{$this->id}' LIMIT 1";
               $responsables="SELECT g.*,r.nombre,r.apellido,r.ci FROM boleta_responsable as g JOIN responsable as r ON r.id = g.id_responsable  WHERE g.id_boleta='{$this->id}'";
               $all = array();$query=parent::consultaRetorno($responsables);
               while($row = mysql_fetch_assoc($query)){
                  $all[] = $row;
               }
               $result=["boletas"=> mysql_fetch_assoc(parent::consultaRetorno($boletas)),
                         "responsables"=> $all
               ];
               return $result;
          }
          public function crear(){
               $date=date("Y-m-d H:i:s");
               $sql=("INSERT INTO boleta(id_chofer,id_vehiculo,unidad,objetivo,uso,lugares,fecha_de,fecha_hasta,created_at) VALUES(
                    '{$this->id_chofer}','{$this->id_vehiculo}','{$this->unidad}','{$this->objetivo}','{$this->uso}','{$this->lugar}','{$this->fecha_de}','{$this->fecha_hasta}','{$date}')");
               parent::consultaSimple($sql);
               $id_boleta=mysql_insert_id();
               foreach ($this->id_responsable as $resp) {
                    $sql=("INSERT INTO boleta_responsable(id_boleta,id_responsable) VALUES('{$id_boleta}','{$resp}')");
                    parent::consultaSimple($sql);
               }
               return "La Gps se Registro Satisfactoriamente";
          }
          public function editar(){
               $date=date("Y-m-d H:i:s");
               $sql=("UPDATE boleta SET id_chofer='{$this->id_chofer}',id_vehiculo='{$this->id_vehiculo}',
                    unidad='{$this->unidad}',objetivo='{$this->objetivo}',uso='{$this->uso}',lugares='{$this->lugar}',fecha_de='{$this->fecha_de}',fecha_hasta='{$this->fecha_hasta}',
                    updated_at='{$date}' WHERE id='{$this->id}'");
               parent::consultaSimple($sql);

               for ($i = 0; $i < count($this->id_responsable); $i++) { //[1,2,3]
                    if ($this->responsable_estado[$i]=="eliminar") {
                         $id_eliminar=$this->id_boleta_responsable[$i];
                         $sql=("DELETE from boleta_responsable where id='{$id_eliminar}'");
                         parent::consultaSimple($sql);
                    }else{
                         if ($this->responsable_estado[$i]=="nuevo") {
                              $nuevo_res=$this->id_responsable[$i];
                              $sql=("INSERT INTO boleta_responsable(id_boleta,id_responsable) VALUES('{$this->id}','{$nuevo_res}')");
                              parent::consultaSimple($sql);
                         }
                    }
     		}
               return "La Gps se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE boleta SET estado=g'0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "la Gps se Elimino Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE boleta SET estado=g'1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Gps dada de ALTA Satisfactoriamente";
          }
          public function ver_placa(){
               $sql="SELECT * FROM boleta WHERE placa='{$this->placa}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
