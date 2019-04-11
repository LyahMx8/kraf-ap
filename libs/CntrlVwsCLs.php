<?php

class CntrlVwsCLs{

	public function mtd_cntrlrd($vrblcontrllr,$vrblviw, $vrblttl = ''){
		$vrblcontrllr=get_class($vrblcontrllr);
		$vrblcontrllr=substr($vrblcontrllr,0,-11);
		$vrblpth='views/'.$vrblviw;
		if(file_exists($vrblpth.'.php')){
			if($vrblttl!=''){
				$this->vrblttl=$vrblttl;
			}
			require_once($vrblpth.".php");
		}else{
			print("Error: Entrada Invalida");
		}
	}
}