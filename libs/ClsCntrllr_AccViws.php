<?php
spl_autoload_register(function($vrbltrmrclss){
    if(file_exists("./controllers/".$vrbltrmrclss.".php")){
        require_once("./controllers/".$vrbltrmrclss.".php");
    }
});

class ClsCntrllr_AccViws{
	public function __construct(){
		$this->vrblcntrl_viws=new CntrlVwsCLs();
		ClsCntrlSnnsctr::init();
	}
}
