<?php 

class ModelObjUsr{
	private $vrbldtos=array();
	public function __construct(){
		//Clsscntrlcnsql::getarrydts(array("1","2"),"fnctntrtipusr");
	}
	public function gettipunsr(){
		return Clsscntrlcnsql::getarrydts(ClsCntrlSnnsctr::getssn("User"),"fnctntrtipusr");
	}
	public function getdtsaclzrnstr($vrbldtsgtclct=array()){
		array_shift($vrbldtsgtclct); array_push($vrbldtsgtclct,ClsCntrlSnnsctr::gethrslct(1));
		return Clsscntrlcnsql::getarrydts($vrbldtsgtclct,"fnctnatlzrnstr");
	}
	public function getdtsbytipsrvcs(){
		return Clsscntrlcnsql::getarrydts(1,"fcntngettipsrvcs");
	}
	public function fcntntrttpusrs($vrbldtsgtclct=array()){
		return Clsscntrlcnsql::getarrydts($vrbldtsgtclct,"fcntngetsrvcsxtip");
	}
	public function fnctntrcntd_srvs($vrblidsrvc=0){
		return Clsscntrlcnsql::getarrydts($vrblidsrvc,"fnctngetcntdsrvc");
	}
	public function funcntningrcmspgn($vrbldtsgtclct=array()){
		return Clsscntrlcnsql::getarrydts($vrbldtsgtclct,"fnctnsetcmbspgs");
	}
	public function funtnslcstcntnd(){
		return Clsscntrlcnsql::getarrydts(1,"fncntnslcntndnstrs");
	}
}