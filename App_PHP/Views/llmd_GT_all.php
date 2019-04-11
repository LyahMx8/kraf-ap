<?php

spl_autoload_register(function($cls){
	if(file_exists("../Libs/".$cls.".php")): require_once("../Libs/".$cls.".php"); endif;
});

if($_SERVER['REQUEST_METHOD']=='GET'):
	if(cls_cntrl_Cnxxn::Fctn_cnvtr_JSNDCD("Fcnt_Obtnr_Cntslt_GT")):
		print(cls_cntrl_Cnxxn::Fctn_cnvtr_JSNDCD("Fcnt_Obtnr_Cntslt_GT"));
	else:
		print(json_encode(array(
				"std_dts"=>2,
				"dscrp_dts"=>"ERROR"
			)));
	endif;
endif;