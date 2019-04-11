<?php 

class SingIn_controller extends ClsCntrllr_AccViws{
	private $vrblcntrl_usr_ngr=array();
	public function __construct(){
		parent::__construct();
	}
	public function Ingreso(){
		$this->vrblcntrl_viws->mtd_cntrlrd($this,"inxEntxCntn","Ingresar - Kraf!");
	}
	public function Cntrl_Mtd_LogIn(){
		$this->vrblcntrl_usr_ngr=isset($_POST)?$_POST:array();
		if(empty($this->vrblcntrl_usr_ngr['cntrlusrnv']) || empty($this->vrblcntrl_usr_ngr['vrcntrlpss'])){
			echo '<script>swal("Ingrese el Usuario y Contraseña","","error");</script>';
		}
		else{
			if(ClsCntrlSnnsctr::Mtdcntrl_stdtsssn($this->vrblcntrl_usr_ngr)){print('<script>window.location="'.URL.'"</script>');}
		}
	}
}