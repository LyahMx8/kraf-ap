<?php 

require_once("Cntns_Accs.php");

spl_autoload_register(function($cls){
	if(file_exists(_ACCSS.$cls.".php")): require_once(_ACCSS.$cls.".php"); endif;
});

class cls_cntrl_Cnxxn{
	public static $cntrlclscnxn, $cnstl_ecctr, $dts_arm_jsn=array("std_dts"=>1,"dts"=>"");
	private static function Fcntn_Rtn_Cnxn(){
		self::$cntrlclscnxn=new mysqli(NMBR_HOST,NMBR_USR,USR_PSS,_CNTRL_DB);
		if(self::$cntrlclscnxn->connect_errno):
			throw new Exception("<script>alert('Error 0001');</script>");
		else:
			return self::$cntrlclscnxn;	self::$cntrlclscnxn->close();
		endif;
	}
	private static function Fcnt_Obtnr_Cntslt_GT(){
		self::$cnstl_ecctr=cls_cntrl_Cnxxn::Fcntn_Rtn_Cnxn()->prepare("SELECT cmptitlcntd,cmpcntnd,cmmpfechpublcn,cmpidusrpublcd FROM TBLNOTICSAPP");
		if(!self::$cnstl_ecctr):
			throw new Exception("<script>alert('ERROR 0002');</script>");
		else:
			if(!self::$cnstl_ecctr->execute()):
				throw new Exception("<script>alert('ERROR 0003');</script>");
			else:
				$gt_rslt_cnslt=self::$cnstl_ecctr->get_result();
				$gt_rslt_dts=$gt_rslt_cnslt->fetch_array(MYSQLI_ASSOC);
				if(count($gt_rslt_dts)>1):
					self::$dts_arm_jsn['dts']=$gt_rslt_dts; return self::$dts_arm_jsn;
				else:
					self::$dts_arm_jsn['std_dts']=3; self::$dts_arm_jsn['dts']="Sin Datos";
					return self::$dts_arm_jsn;
				endif;
			endif;
		endif;
	}
	private static function Fnctn_Obtnr_Dts_accs_PST($vrbldst=array()){
		self::$cnstl_ecctr=cls_cntrl_Cnxxn::Fcntn_Rtn_Cnxn()->prepare("SELECT cmpidtipusr, cmpnmbrs, cmpappllds, cmppassusr FROM TBLUSERSAPP WHERE cmpnmbrusr= ?");
		if(!self::$cnstl_ecctr):
			throw new Exception("<script>alert('ERROR 0002');</script>");
		else:
			self::$cnstl_ecctr->bind_param("s",$vrbldst['cntrl_usr']);
			if(!self::$cnstl_ecctr->execute()):
				throw new Exception("<script>alert('ERROR 0003');</script>");
			else:
				$gt_rslt_cnslt=self::$cnstl_ecctr->get_result();
				$gt_rslt_dts=$gt_rslt_cnslt->fetch_array(MYSQLI_ASSOC);
				if(count($gt_rslt_dts)>1):
					$trd_dts=new cls_auth_logn($gt_rslt_dts,$vrbldst);
					return $trd_dts->rtrnr_vlrs();
				else:
					self::$dts_arm_jsn['std_dts']=3; self::$dts_arm_jsn['dts']="Sin Datos";
					return self::$dts_arm_jsn;
				endif;
			endif;
		endif;
	}
	public static function Fctn_cnvtr_JSNDCD($mtd_accs="",$prmtrs=array()){
		try{
			if(empty($mtd_accs)):
				throw new Exception("<script>alert('ERROR 0004');</script>");
			else:
				if(method_exists("cls_cntrl_Cnxxn",$mtd_accs)):
					return json_encode(cls_cntrl_Cnxxn::{$mtd_accs}($prmtrs));
				else:
					throw new Exception("<script>alert('ERROR 0005');</script>");
				endif;	
			endif;
		}
		catch(Exception $rspt_evnt){
			print($rspt_evnt->getMessage());
		}
	}
}