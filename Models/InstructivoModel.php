<?php
     class InstructivoModel extends Conexion{
          public $user_id;
          public $session;
          function __construct(){
               parent::__construct();
               $this->session=Session::getSession('Usuario');
               if (isset($this->session)){
                    $this->user_id=$this->session['id_persona'];
               }
          }
          public function set($atributo,$contenido){
               $this->$atributo=$contenido;
          }
          public function get($atributo){
               return $this->$atributo;
          }
          public function listar(){
               $persona="SELECT * FROM persona WHERE estado = 1 AND tipo=3";
               $instructivo="SELECT i.*,p.nombre,p.brevet FROM instructivo as i JOIN persona as p ON p.id = i.id_chofer WHERE i.estado=1 AND (i.fecha BETWEEN '{$this->desde}' AND '{$this->hasta}') AND i.id_usuario='{$this->user_id}' ";
               $bajas="SELECT i.*,p.nombre,p.brevet FROM instructivo as i JOIN persona as p ON p.id = i.id_chofer WHERE i.estado=0 AND i.id_usuario='{$this->user_id}'";
               $result=["instructivos"=> parent::consultaRetorno($instructivo),
                         "bajas"=> parent::consultaRetorno($bajas),
                         "choferes"=> parent::consultaRetorno($persona),"desde"=> $this->desde,"hasta"=>$this->hasta
               ];
               return $result;
          }
          public function ver(){
               $sql="SELECT i.*,p.nombre,e.nombre as usuario FROM instructivo as i  JOIN persona as p ON p.id = i.id_chofer JOIN persona as e ON e.id = i.id_usuario WHERE i.id = '{$this->id}' LIMIT 1";
               return mysql_fetch_assoc(parent::consultaRetorno($sql));
          }
          public function crear(){
               $year=date('Y', strtotime($this->fecha));
               $sql=parent::consultaRetorno("SELECT count(*) as total FROM instructivo WHERE YEAR(fecha) = '{$year}'");
               $val=mysql_fetch_assoc($sql);$codigo=intval($val['total'])+1;

               $sql=("INSERT INTO instructivo(id_usuario,id_chofer,descripcion,fecha,codigo,created_at) VALUES(
                    '{$this->user_id}','{$this->id_chofer}','{$this->descripcion}','{$this->fecha}','{$codigo}',NOW())");
               parent::consultaSimple($sql);
               return "El Instructivo se Registro Satisfactoriamente";
          }
          public function editar(){
                    $sql=("UPDATE instructivo SET id_chofer='{$this->id_chofer}',descripcion='{$this->descripcion}',
                         fecha='{$this->fecha}',updated_at=NOW() WHERE id='{$this->id}'");
               parent::consultaSimple($sql);
               return "El Instructivo se Modifico Satisfactoriamente";
          }
          public function eliminar(){
               $sql="UPDATE instructivo SET estado='0'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "Instructivo se dio de baja Satisfactoriamente";
          }
          public function alta(){
               $sql="UPDATE instructivo SET estado='1'
                    WHERE id='{$this->id}'";
               parent::consultaSimple($sql);
               echo "Instructivo se dio de Alta Satisfactoriamente";
          }
     }
 ?>
