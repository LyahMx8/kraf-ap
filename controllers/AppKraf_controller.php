<?php
class AppKraf_controller extends ClsCntrllr_AccViws {
	private $vrbldtsingrjsn;
	private $vrblmodappkrf;
	private $dts_dnrd_gt=array();
	private $dts_DB_gt=array("std_dts"=>"1");
	public function __construct(){
		$this->vrblmodappkrf = new ModelObjApp();
	}
	public function Ingresar(){
		if($_SERVER['REQUEST_METHOD']=='POST'):
			if(method_exists($this->vrblmodappkrf,"fnctncdtsing")):
				$rcltr_dts=json_decode(file_get_contents("php://input"),true);
				if(is_null($rcltr_dts) || empty($rcltr_dts)):
					print(json_encode(array(
						"std_dts"=>"3",
						"dscrp_dts"=>"Se ha detectado un Problema"
					)));
				else:
					$this->dts_dnrd_gt=$rcltr_dts; print(json_encode($this->lmpr_dts()));
				endif;
			else:
				print(json_encode(array(
						"std_dts"=>"2",
						"dscrp_dts"=>"ERROR Inexplicable llama al Programador"
					)));
			endif;
		endif;
	}
	private function lmpr_dts(){
		$this->dts_DB_gt['dscrp_dts']=$this->vrblmodappkrf->fnctncdtsing(ClsCntrlSnnsctr::Lmpr_accsnpts($this->dts_dnrd_gt['cntrl_usr']));
		if($this->dts_dnrd_gt['cntrl_pss']==$this->dts_DB_gt['dscrp_dts']['cmppssusr']):
			array_pop($this->dts_DB_gt['dscrp_dts']); return $this->dts_DB_gt;
		else:
			return array(
					"std_dts"=>"4",
					"dscrp_dts"=>"Contraseña o Usuario Incorrectos"
				);
		endif;
	}
}