<?php
     class ReporteModel extends Conexion{
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
               $boletas="SELECT b.*,p.nombre as chofer,p.brevet,v.tipo,v.placa FROM boleta as b
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo";
               $choferes="SELECT id,nombre,brevet FROM persona WHERE estado='1' AND tipo=3";
               $responsables="SELECT * FROM responsable WHERE estado='1'";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $result=["boletas"=> parent::consultaRetorno($boletas),
                         "choferes"=> parent::consultaRetorno($choferes),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "responsables"=> parent::consultaRetorno($responsables)
               ];
               return $result;
          }
          public function viaje(){
               $viajes="SELECT b.id_chofer,count(*) as total,p.nombre FROM boleta as b
                    JOIN persona as p ON p.id=b.id_chofer
                    WHERE (b.fecha_de BETWEEN '{$this->desde}' AND '{$this->hasta}') GROUP BY b.id_chofer ";
               $result=["todos"=> parent::consultaRetorno($viajes),
                    "desde"=> $this->desde,"hasta"=>$this->hasta
               ];
               return $result;
          }
          public function imprimir_uno(){
               $chofer="SELECT * FROM persona WHERE id='{$this->id}' LIMIT 1";
               $viajes=parent::consultaRetorno("SELECT b.*,CONCAT(v.tipo,' (',v.placa,')') as vehiculo,m.nombre as marca,v.placa, u.nombre as unidad,r.nombre as redsalud,i.nombre as municipio,e.nombre as establecimiento FROM boleta as b
                    JOIN vehiculo as v ON v.id=b.id_vehiculo
                    JOIN marca as m ON m.id=v.id_marca
                    JOIN unidad as u ON u.id=b.id_unidad
                    LEFT JOIN redsalud as r ON r.id = b.id_redsalud
                    LEFT JOIN municipio as i ON i.id = b.id_municipio
                    LEFT JOIN establecimiento as e ON e.id = b.id_establecimiento
                    WHERE (b.fecha_de BETWEEN '{$this->desde}' AND '{$this->hasta}') AND b.id_chofer='{$this->id}' ");
               $all = array();while($row = mysql_fetch_assoc($viajes)) {$all[] = $row;}
               $count=0;while ($count<count($all)) {
                    $id_a=$all[$count]['id'];
                    $result=parent::consultaRetorno("SELECT CONCAT(r.nombre,' ',r.apellido) as nombre FROM boleta_responsable as b JOIN responsable as r ON r.id=b.id_responsable WHERE b.id_boleta = '{$id_a}' ");
                    $all2 = array();while($row = mysql_fetch_assoc($result)) {$all2[] = $row;}
                    $all[$count]["responsables"]=$all2;
                    $count++;
               }
               $result=["chofer"=> mysql_fetch_assoc(parent::consultaRetorno($chofer)),
                         "boletas"=> $all,
                         "desde"=> $this->desde,"hasta"=>$this->hasta
               ];
               return $result;
          }
          public function ver(){
               $boletas="SELECT b.*,p.id as id_chofer,p.nombre,p.brevet,v.id as id_vehiculo,v.color,v.placa,v.tipo,m.nombre as marca FROM boleta as b
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo JOIN marca as m ON m.id = v.id_marca WHERE b.id = '{$this->id}' LIMIT 1";
               $responsables="SELECT b.*,r.nombre,r.apellido,r.ci FROM boleta_responsable as b JOIN responsable as r ON r.id = b.id_responsable  WHERE b.id_boleta='{$this->id}'";
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
               return "La Reporte se Registro Satisfactoriamente";
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
               return "La Reporte se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE boleta SET estado=b'0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "la Reporte se Elimino Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE boleta SET estado=b'1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Reporte dada de ALTA Satisfactoriamente";
          }
          public function ver_placa(){
               $sql="SELECT * FROM boleta WHERE placa='{$this->placa}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
