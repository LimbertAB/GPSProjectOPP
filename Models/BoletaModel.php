<?php
     class BoletaModel extends Conexion{
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
                    JOIN vehiculo as v ON v.id = b.id_vehiculo WHERE b.estado='1' AND YEAR(b.fecha_de)='{$this->year}' AND MONTH(b.fecha_de)='{$this->month}'";
               $bajas="SELECT b.*,p.nombre as chofer,p.brevet,v.tipo,v.placa FROM boleta as b
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo WHERE b.estado='0'";
               $choferes="SELECT id,nombre,brevet FROM persona WHERE estado='1' AND tipo=3";
               $responsables="SELECT * FROM responsable WHERE estado='1'";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $redsalud="SELECT * FROM redsalud";
               $comunidad="SELECT * FROM comunidad";
               $municipio="SELECT * FROM municipio";
               $establecimiento="SELECT * FROM establecimiento";
               $unidad="SELECT * FROM unidad WHERE estado=1";
               $result=["boletas"=> parent::consultaRetorno($boletas),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "choferes"=> parent::consultaRetorno($choferes),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "responsables"=> parent::consultaRetorno($responsables),"month"=> $this->month,"year"=>$this->year,
                         "redsalud"=>parent::consultaRetorno($redsalud),
                         "municipios"=>parent::consultaRetorno($municipio),
                         "comunidades"=>parent::consultaRetorno($comunidad),
                         "establecimientos"=>parent::consultaRetorno($establecimiento),
                         "unidades"=>parent::consultaRetorno($unidad),
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
               return "La Boleta se Registro Satisfactoriamente";
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
               return "La Boleta se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE boleta SET estado='0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "la Boleta se dio de baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE boleta SET estado='1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "Boleta dada de ALTA Satisfactoriamente";
          }
          public function ver_placa(){
               $sql="SELECT * FROM boleta WHERE placa='{$this->placa}'";
               $resultado=parent::consultaRetorno($sql);
               return mysql_num_rows($resultado);
          }
     }
 ?>
