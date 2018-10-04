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
               $boletas=parent::consultaRetorno("SELECT b.*,p.nombre as chofer,p.brevet,v.tipo,v.placa,u.nombre as unidad FROM boleta as b
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN unidad as u ON u.id = b.id_unidad
                    JOIN vehiculo as v ON v.id = b.id_vehiculo WHERE b.estado='1' AND  (b.fecha_de BETWEEN '{$this->desde}' AND '{$this->hasta}') ");
               $all = array();while($row = mysql_fetch_assoc($boletas)){$all[] = $row;}
               $count=0;
               while ($count < count($all)) {
                    $rowboleta=$all[$count]["id"];
                    $resp=parent::consultaRetorno("SELECT b.*,CONCAT(r.nombre,' ',r.apellido) as nombre FROM boleta_responsable as b JOIN responsable as r ON r.id = b.id_responsable  WHERE b.id_boleta='{$rowboleta}' ");
                    $allres = array();while($row = mysql_fetch_assoc($resp)){$allres[] = $row;}
                    $all[$count]['responsables']=$allres;
                    $count=$count+1;
               }
               $bajas=parent::consultaRetorno("SELECT b.*,p.nombre as chofer,p.brevet,v.tipo,v.placa,u.nombre as unidad  FROM boleta as b
                    JOIN unidad as u ON u.id = b.id_unidad
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo WHERE b.estado='0'");
               $all2 = array();while($row = mysql_fetch_assoc($bajas)){$all2[] = $row;}
               $count=0;
               while ($count < count($all2)) {
                    $rowboleta=$all2[$count]["id"];
                    $resp=parent::consultaRetorno("SELECT b.*,CONCAT(r.nombre,' ',r.apellido) as nombre FROM boleta_responsable as b JOIN responsable as r ON r.id = b.id_responsable  WHERE b.id_boleta='{$rowboleta}' ");
                    $allres = array();while($row = mysql_fetch_assoc($resp)){$allres[] = $row;}
                    $all2[$count]['responsables']=$allres;
                    $count=$count+1;
               }
               $choferes="SELECT id,nombre,brevet FROM persona WHERE estado='1' AND tipo=3";
               $responsables="SELECT * FROM responsable WHERE estado='1'";
               $vehiculos="SELECT v.id,v.tipo,v.placa,m.nombre as marca FROM vehiculo as v JOIN marca as m ON m.id = v.id_marca WHERE v.estado='1'";
               $redsalud="SELECT * FROM redsalud";
               $comunidad="SELECT * FROM comunidad";
               $municipio="SELECT * FROM municipio";
               $establecimiento="SELECT * FROM establecimiento";
               $unidad="SELECT * FROM unidad WHERE estado=1";
               $result=["boletas"=> $all,
                         "bajas"=> $all2,
                         "choferes"=> parent::consultaRetorno($choferes),
                         "vehiculos"=> parent::consultaRetorno($vehiculos),
                         "responsables"=> parent::consultaRetorno($responsables),"desde"=> $this->desde,"hasta"=>$this->hasta,
                         "redsalud"=>parent::consultaRetorno($redsalud),
                         "municipios"=>parent::consultaRetorno($municipio),
                         "comunidades"=>parent::consultaRetorno($comunidad),
                         "establecimientos"=>parent::consultaRetorno($establecimiento),
                         "unidades"=>parent::consultaRetorno($unidad),
               ];
               return $result;
          }
          public function ver(){
               $boletas="SELECT b.*,p.id as id_chofer,p.nombre,p.brevet,v.color,v.placa,v.tipo,v.origen,m.nombre as marca,d.nombre as unidad,j.nombre as jefatura,r.nombre as redsalud,u.nombre as municipio,e.nombre as establecimiento FROM boleta as b
                    LEFT JOIN redsalud as r ON r.id = b.id_redsalud
                    LEFT JOIN municipio as u ON u.id = b.id_municipio
                    LEFT JOIN establecimiento as e ON e.id = b.id_establecimiento
                    JOIN persona as p ON p.id = b.id_chofer JOIN unidad as d ON d.id = b.id_unidad JOIN jefatura as j ON j.id = d.id_jefatura
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
               $year=date('Y', strtotime($this->fecha_de));
               $sql=parent::consultaRetorno("SELECT count(*) as total FROM boleta WHERE YEAR(fecha_de) = '{$year}'");
               $val=mysql_fetch_assoc($sql);$codigo=intval($val['total'])+1;

               $sql=("INSERT INTO boleta(id_chofer,id_vehiculo,id_unidad,objetivo,uso,fecha_de,fecha_hasta,id_establecimiento,id_municipio,id_redsalud,tipo_lugar,ciudad,lugares,codigo,created_at)
               VALUES('{$this->id_chofer}','{$this->id_vehiculo}','{$this->id_unidad}','{$this->objetivo}','{$this->uso}','{$this->fecha_de}','{$this->fecha_hasta}',
                    '{$this->id_establecimiento}','{$this->id_municipio}','{$this->id_redsalud}','{$this->tipo_lugar}','{$this->ciudad}','{$this->lugar}','{$codigo}',NOW())");
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
                    id_unidad='{$this->id_unidad}',objetivo='{$this->objetivo}',uso='{$this->uso}',lugares='{$this->lugar}',fecha_de='{$this->fecha_de}',fecha_hasta='{$this->fecha_hasta}',
                    id_establecimiento='{$this->id_establecimiento}',id_municipio='{$this->id_municipio}',id_redsalud='{$this->id_redsalud}',tipo_lugar='{$this->tipo_lugar}',ciudad='{$this->ciudad}',updated_at='{$date}' WHERE id='{$this->id}'");
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
