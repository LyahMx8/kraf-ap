<?php 

class ModelObjIndx{
	private $vrblcntrl_tipsrvc;
	public function __construct(){
		/* Objetos que se ejecuten desde el principio */
	}
	public function fnctntrdtsnstrs(){
		return Clsscntrlcnsql::getarrydts(1,"fnctntrdtnstrs");
	}
	public function fnctontrdtstipsrvc($vrblgettipserv){
		$this->vrblcntrl_tipsrvc=$vrblgettipserv; return Clsscntrlcnsql::getarrydts($vrblgettipserv,"fncntntrnmbtipsrv");
	}
	public function fcntngetservcos(){
		return Clsscntrlcnsql::getarrydts($this->vrblcntrl_tipsrvc,"fcntngetdtsservc");
	}
}