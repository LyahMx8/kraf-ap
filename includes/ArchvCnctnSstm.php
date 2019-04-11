<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

require_once("ArchvConfg.php");

class ClscnxSystmKrnllcl{
	private static $VrblCnnxnsqlilcl="";
	protected static $VrblCnsltNrml="";
	private static function FcntnCnxnDBLcl(){
		self::$VrblCnnxnsqlilcl=new mysqli(CTRL_HST,CTRL_NME,CTRL_PAS,CTRL_DBN);
		self::$VrblCnnxnsqlilcl->set_charset('utf8');
		if(self::$VrblCnnxnsqlilcl->connect_error){
			throw new Exception('<script>swal("Ups! Ha Surgido un Problema! Intentalo Mas Tarde!!","","error");</script>');
		}
		else{
			return self::$VrblCnnxnsqlilcl;
		}
		self::$VrblCnnxnsqlilcl->close();
	}
	private static function FcntnPssrXcntn(){
		try {
			return self::FcntnCnxnDBLcl();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	private static function FcntnXcntnCnslt($VrblCnsltSstm,$vrbldtsncsr,$vrbltpdts,$vrblctddts){
		self::$VrblCnsltNrml=self::FcntnPssrXcntn()->prepare($VrblCnsltSstm);
		if(!self::$VrblCnsltNrml=self::FcntnPssrXcntn()->prepare($VrblCnsltSstm)){
			throw new Exception('<script>swal("Ha Ocurrido un Error con el Ingreso Por Favor Informelo","","error");</script>');
		}
		else{
			switch (is_array($vrbldtsncsr)) {
				case true:
					$vrblarry=array();
					foreach ($vrbldtsncsr as $ky => $vle): $vrblarry[$ky]=&$vrbldtsncsr[$ky]; endforeach;
					call_user_func_array(array(self::$VrblCnsltNrml,'bind_param'),array_merge(array($vrbltpdts),$vrblarry));
					if(!self::$VrblCnsltNrml->execute()){throw new Exception('<script>swal("Ha Ocurrido un Error con el Ingreso Por Favor Informelo","","error");</script>');
					}else return true; break;
				case false:
					self::$VrblCnsltNrml->bind_param($vrbltpdts,$vrbldtsncsr);
					if(!self::$VrblCnsltNrml->execute()){throw new Exception('<script>swal("Ha Ocurrido un Error con el Ingreso Por Favor Informelo","","error");</script>');}
					else{
						switch($vrblctddts):
							case 1:
								$result=self::$VrblCnsltNrml->get_result();
								$lista=$result->fetch_array(MYSQLI_ASSOC);
								if(count($lista)>=1) return $lista; break; 
							case 2: 
								$result=self::$VrblCnsltNrml->get_result();
								while($lista=$result->fetch_array(MYSQLI_ASSOC)): $vrbldts[]=$lista; endwhile; return $vrbldts; break;
							default: throw new Exception('<script>swal("Ha Ocurrido un error Inesperado!","","error");</script>'); break;				
						endswitch;
					} break;
				default: throw new Exception('<script>swal("Ha Ocurrido un Error Inesperado!","","error");</script>'); break;
			}
		}
	}
	public static function FcntnCnstlArch($VrblCnsltArch,$vrbldtsncsr,$vrbltpdts,$vrbltipcnslt=0){
		try {
			return self::FcntnXcntnCnslt($VrblCnsltArch,$vrbldtsncsr,$vrbltpdts,$vrbltipcnslt);
		} catch (Exception $z){
			echo $z->getMessage();
		}
	}
}
