<?php
include_once("ArchvCnctnSstm.php");

class Clsscntrlcnsql{
	private static $vrblcnrltsql=array();
	private static $vrblmtdoslt;

	public static function getarrydts($vrblarrydts,$vrblmtdcnslt){
		self::$vrblcnrltsql = $vrblarrydts; self::$vrblmtdoslt= new Clsscntrlcnsql;
		if(!is_null(self::$vrblcnrltsql) && !empty(self::$vrblmtdoslt)){
			return self::$vrblmtdoslt->{$vrblmtdcnslt}();
		}else{return false;}
	}
	private function fnctn_accss(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmppssusr,cmpidtpusr,cmpnmbrsusr FROM TBLCNTRLUSRS WHERE cmpnmbrusr = ? ",strtolower(Clsscntrlcnsql::$vrblcnrltsql['cntrlusrnv']),"s",1);
		if(!empty($vrblcntrl)){return $vrblcntrl;}else{ return false;}
	}
	private function fnctntrtipusr(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpnbmrtp FROM TBLCNTRLTPUSR WHERE cmpidtpusr = ? ",Clsscntrlcnsql::$vrblcnrltsql['cmpidtpusr'],"i",1);
		if(!empty($vrblcntrl)){return $vrblcntrl;}else{ return false;}
	}
	private function fnctnatlzrnstr(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("UPDATE TBLDTSINCFOTR SET cmptitlnstrs = ?, cmpcntndinc = ?, cmpfchacntd = ?  WHERE cmpidprtinc = 1 ",self::$vrblcnrltsql,"sss");
		return $vrblcntrl;
	}
	private function fnctntrdtnstrs(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmptitlnstrs,cmpcntndinc FROM TBLDTSINCFOTR WHERE cmpidprtinc = ?",self::$vrblcnrltsql,"i",1);
		return $vrblcntrl;
	}
	private function fncntntrnmbtipsrv(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpnombrsrvco FROM TBLDTSSERVCSTIP WHERE cmpidservco = ?",self::$vrblcnrltsql,"i",1);
		return $vrblcntrl;	
	}
	private function fcntngetdtsservc(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpclsiconserv,cmpnombservco FROM TBLDTSSERVCSOPCN WHERE cmpidservco = ?",self::$vrblcnrltsql,"i",2);
		return $vrblcntrl;	
	}
	private function fcntngettipsrvcs(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpidservco,cmpnombrsrvco FROM TBLDTSSERVCSTIP WHERE cmpstdservco = ?",self::$vrblcnrltsql,"i",2);
		return $vrblcntrl;	
	}
	private function fcntngetsrvcsxtip(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpidservcicnt,cmpnombservco FROM TBLDTSSERVCSOPCN WHERE cmpidservco = ? AND cmpstdservcio = 1",self::$vrblcnrltsql,"i",2);
		return $vrblcntrl;		
	}
	private function fnctngetcntdsrvc(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpcontndsrvc FROM TBLDTSSERVCSOPCN WHERE cmpidservcicnt = ? AND cmpstdservcio = 1",self::$vrblcnrltsql,"i",1);
		return $vrblcntrl;
	}
	private function fnctnsetcmbspgs(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("UPDATE TBLDTSSERVCSOPCN SET cmpcontndsrvc = ? WHERE cmpidservcicnt = ? AND cmpstdservcio = 1",self::$vrblcnrltsql,"si");
		return $vrblcntrl;
	}
	private function fncntnslcntndnstrs(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpnmbrpgn FROM TBLDTSINCFOTR WHERE cmpidprtinc = ? AND cmpstdcntnd = 1",self::$vrblcnrltsql,"i",1);
		return $vrblcntrl;
	}
	/* Consultas Para App */
	private function fnctntrdtsapingr(){
		$vrblcntrl=ClscnxSystmKrnllcl::FcntnCnstlArch("SELECT cmpnmbrsusr, cmpidtpusr, cmppssusr FROM TBLCNTRLUSRS WHERE cmpnmbrusr = ?",self::$vrblcnrltsql,"s",1);
		return $vrblcntrl;
	}
}