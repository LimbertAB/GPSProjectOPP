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
               $cronograma=parent::consultaRetorno("SELECT * FROM cronograma WHERE YEAR(fecha_de)='{$this->year}' AND MONTH(fecha_de)='{$this->month}' ");
               $all = array();
               while($row = mysql_fetch_assoc($cronograma)) {
                  $all[] = $row;
               }
               $count=0;
               while ($count<count($all)) {
                    $id_a=$all[$count]['id'];
                    $result=mysql_fetch_assoc(parent::consultaRetorno("SELECT COUNT(*) as total FROM cronograma_boleta WHERE id_cronograma = '{$id_a}' "));
                    $all[$count]["total"]=$result['total'];
                    $count++;
               }
               $mesanterior=intval($this->month)-1;
               $boletas=parent::consultaRetorno("SELECT b.*,c.id as id_cronograma,p.nombre as chofer,CONCAT(v.tipo,' (',v.placa,')') as vehiculo FROM boleta as b
                    LEFT JOIN cronograma_boleta as c ON c.id_boleta=b.id
                    JOIN persona as p ON p.id=b.id_chofer
                    JOIN vehiculo as v ON v.id=b.id_vehiculo
                    WHERE YEAR(b.fecha_de)='{$this->year}' AND MONTH(b.fecha_de)='{$this->month}' OR (YEAR(b.fecha_de)='{$this->year}' AND MONTH(b.fecha_de)='{$mesanterior}')
                    GROUP BY (b.id)");
               $all_boleta = array();while($row = mysql_fetch_assoc($boletas)) {$all_boleta[] = $row;}
               $au=0;
               while ($au < count($all_boleta)) {
                    $all_boleta[$au]['validate']=true;
                    $au++;
               }
               $result=["cronogramas"=> $all,
                         "month"=> $this->month,"year"=>$this->year,
                         "boletas"=>$all_boleta
               ];
               return $result;
          }
          public function ver(){
               $query=parent::consultaRetorno("SELECT * FROM cronograma WHERE id='{$this->id}' LIMIT 1");
               $cronograma=mysql_fetch_assoc($query);
               $cronograma_boleta=parent::consultaRetorno("SELECT c.id as id_cronograma_boleta,b.*,CONCAT(v.tipo,' (',v.placa,')') as vehiculo ,CONCAT(p.nombre,' (', p.brevet ,')') as chofer FROM cronograma_boleta as c
                    JOIN boleta as b ON b.id = c.id_boleta
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo
                    WHERE c.id_cronograma='{$this->id}' ");
               $all = array();while($row = mysql_fetch_assoc($cronograma_boleta)) {$all[] = $row;}
               $count=0;while ($count<count($all)) {
                    $id_a=$all[$count]['id'];
                    $result=parent::consultaRetorno("SELECT CONCAT(r.nombre,' ',r.apellido) as nombre FROM boleta_responsable as b JOIN responsable as r ON r.id=b.id_responsable WHERE b.id_boleta = '{$id_a}' ");
                    $all2 = array();while($row = mysql_fetch_assoc($result)) {$all2[] = $row;}
                    $all[$count]["responsables"]=$all2;
                    $count++;
               }
               $year_cronograma=date('Y', strtotime($cronograma['fecha_de']));
               $year_cronograma2=$year_cronograma;
               $month_cronograma=date('m', strtotime($cronograma['fecha_de']));
               if (intval($month_cronograma)>1) {$month_cronograma2=intval($month_cronograma)-1;
               }else{$month_cronograma2=12;$year_cronograma2=intval($year_cronograma2)-1;}
               $boletas=parent::consultaRetorno("SELECT b.*,c.id as id_cronograma,p.nombre as chofer,CONCAT(v.tipo,' (',v.placa,')') as vehiculo FROM boleta as b
                    LEFT JOIN cronograma_boleta as c ON c.id_boleta=b.id
                    JOIN persona as p ON p.id=b.id_chofer
                    JOIN vehiculo as v ON v.id=b.id_vehiculo
                    WHERE YEAR(b.fecha_de)='{$year_cronograma}' AND MONTH(b.fecha_de)='{$month_cronograma}' OR (YEAR(b.fecha_de)='{$year_cronograma2}' AND MONTH(b.fecha_de)='{$month_cronograma2}')
                    GROUP BY (b.id)");
               $all_boleta = array();while($row = mysql_fetch_assoc($boletas)) {$all_boleta[] = $row;} //1,2,3   //2,4,5

               for ($i=0; $i < count($all_boleta); $i++) {
                    $contador=0;
                    for ($j=0; $j < count($all) ; $j++) {
                         if($all_boleta[$i]['id']==$all[$j]['id']){
                              $contador++;
                         }
                    }
                    if ($contador==0) {
                         $all_boleta[$i]['validate']=true;
                    }else{
                         $all_boleta[$i]['validate']=false;
                    }
               }
               $result=["cronograma"=> $cronograma,"cronograma_boletas"=> $all,"boletas"=> $all_boleta];
               return $result;
          }
          public function crear(){
               $sql=("INSERT INTO cronograma(fecha_de,fecha_hasta,created_at) VALUES(
                    '{$this->fecha_de}','{$this->fecha_hasta}',NOW())");
               parent::consultaSimple($sql);
               $id_cronograma=mysql_insert_id();
               foreach ($this->id_boleta as $resp) {
                    $sql=("INSERT INTO cronograma_boleta(id_cronograma,id_boleta,created_at) VALUES('{$id_cronograma}','{$resp}',NOW())");
                    parent::consultaSimple($sql);
               }
               return "El Cronograma se Registro Satisfactoriamente";
          }
          public function editar(){
               $sql=("UPDATE cronograma SET fecha_de='{$this->fecha_de}',fecha_hasta='{$this->fecha_hasta}',updated_at=NOW()
                    WHERE id='{$this->id}' ");
               parent::consultaSimple($sql);
               foreach ($this->id_boleta as $resp) {
                    $sql=("INSERT INTO cronograma_boleta(id_cronograma,id_boleta,created_at) VALUES('{$this->id}','{$resp}',NOW())");
                    parent::consultaSimple($sql);
               }
               return "El Cronograma se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="DELETE FROM cronograma_boleta WHERE id='{$this->id}' ";
               parent::consultaSimple($sql);
               echo "Cronograma dado de Baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE cronograma SET estado=b'1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               return "Cronograma dado de ALTA Satisfactoriamente";
          }
          public function imprimir(){
               $cronograma=parent::consultaRetorno("SELECT * FROM cronograma WHERE id='{$this->id}' LIMIT 1");
               $boletas=parent::consultaRetorno("SELECT c.id as id_cronograma_boleta,b.*,CONCAT(v.tipo,' (',v.placa,')') as vehiculo ,CONCAT(p.nombre,' (', p.brevet ,')') as chofer FROM cronograma_boleta as c
                    JOIN boleta as b ON b.id = c.id_boleta
                    JOIN persona as p ON p.id = b.id_chofer
                    JOIN vehiculo as v ON v.id = b.id_vehiculo
                    WHERE c.id_cronograma='{$this->id}' ");
               $all = array();while($row = mysql_fetch_assoc($boletas)) {$all[] = $row;}
               $count=0;while ($count<count($all)) {
                    $id_a=$all[$count]['id'];
                    $result=parent::consultaRetorno("SELECT CONCAT(r.nombre,' ',r.apellido) as nombre FROM boleta_responsable as b JOIN responsable as r ON r.id=b.id_responsable WHERE b.id_boleta = '{$id_a}' ");
                    $all2 = array();while($row = mysql_fetch_assoc($result)) {$all2[] = $row;}
                    $all[$count]["responsables"]=$all2;
                    $count++;
               }
               $result=["cronograma"=> mysql_fetch_assoc($cronograma),"boletas"=> $all];
               return $result;


          }
     }
 ?>
