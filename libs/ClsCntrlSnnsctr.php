<?php 
/* Configuraciones de la Sesion y de las cookies*/
ini_set('session.hash_function','whirlpool');
ini_set('session.cookie_secure',0);
ini_set('session.cookie_httponly',1);
ini_set('session.use_trans_sid',0);
ini_set('session.use_cookies',1);
ini_set('session.use_only_cookies',1);

require_once(DIRIZ."/../includes/Archvknrlcnslt.php");

class ClsCntrlSnnsctr{
	private static $vrbldtosincn=array();
	public static function init(){
		if(empty(session_id())){
			session_name("KRAF_AP");
			session_start();
			session_regenerate_id();
		}
	}
	public static function Mtdcntrl_stdtsssn($arrycntrldtsgt){
		try{
			if(strlen($arrycntrldtsgt['vrcntrlpss'])>16 || strlen($arrycntrldtsgt['cntrlusrnv'])>16){
				throw new Exception('<script>swal("Espera...", "Los campos no pueden tener mas de 16 Caracteres", "error");</script>');
			}
			else{
				foreach($arrycntrldtsgt as $vrblaccsid => $vrblhsdts){
					$arrycntrldtsgt[$vrblaccsid]=self::Lmpr_accsnpts($vrblhsdts);
				}
				self::$vrbldtosincn=Clsscntrlcnsql::getarrydts($arrycntrldtsgt,"fnctn_accss");
				if(self::$vrbldtosincn['cmppssusr']==hash(CNTL_NCRYP,$arrycntrldtsgt['vrcntrlpss'])){
					unset(self::$vrbldtosincn['cmppssusr']); self::cretesessn("User",self::$vrbldtosincn);
					return true;
				}else{throw new Exception('<script>swal("Datos Ingresados Incorrectos","","error");</script>');}					
			}
		}
		catch(Exception $cntrling){
			echo $cntrling->getMessage();
		}
	}
	public static function destry(){
		if(session_destroy())
			unset($_SESSION['User']);
			return true;
	}
	public static function Lmpr_accsnpts($vrblclnnpt){
		$vrblbsqd = array(
		    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
		    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
		    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
		    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
	  	);
	    return preg_replace($vrblbsqd[0], '', $vrblclnnpt);
	}
	public static function dscfrjsscpt($vrblncrytp){
		if(empty($vrblncrytp)) print('<scritp>swal("Error en los Datos Comunicalo","","error")</script>');
		else
			return base64_decode($vrblncrytp);
	}
	public static function getssn($key){
		if(isset($_SESSION[$key])) return $_SESSION[$key];
		else return false;
	}
	public static function gethrslct($vrblscltr=0){
		date_default_timezone_set("America/Bogota");
		if($vrblscltr==1):
			return date('Y-m-d H:i:s');
		else:
			return date("Y-m-d");
		endif;
	}
	private static function cretesessn($key,$values){
		if(!isset($_SESSION[$key])) $_SESSION[$key]=$values;
		else return false;
	}
}