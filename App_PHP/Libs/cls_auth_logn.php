<?php

class cls_auth_logn{
	private $dts_DB_gt=array();
	private $dts_dnrd_gt=array();

	public function __construct($cntrl_dts_DB=array(),$cntrl_dts_dnrd=array()){
		$this->dts_DB_gt=$cntrl_dts_DB; $this->dts_dnrd_gt=$cntrl_dts_dnrd;
	}
	private function lmpr_dts(){
		if($this->dts_dnrd_gt['cntrl_pss']==$this->dts_DB_gt['cmppassusr']):
			array_pop($this->dts_DB_gt); return $this->dts_DB_gt;
		else:
			return array(
					"std_dts"=>4,
					"dscrp_dts"=>"Contraseña o Usuario Incorrectos"
				);
		endif;
	}
	public function rtrnr_vlrs(){
		return $this->lmpr_dts();
	}
}