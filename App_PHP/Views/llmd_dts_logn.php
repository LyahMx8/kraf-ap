<?php

spl_autoload_register(function($cls){
	if(file_exists("../Libs/".$cls.".php")): require_once("../Libs/".$cls.".php"); endif;
});

if($_SERVER['REQUEST_METHOD']=='POST'):
	if(cls_cntrl_Cnxxn::Fctn_cnvtr_JSNDCD("Fnctn_Obtnr_Dts_accs_PST")):
		$rcltr_dts=isset($_POST)?$_POST:array();
		//$rcltr_dts=array('cntrl_usr' =>"cristian",'cntrl_pss'=>"3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d7");
		print(cls_cntrl_Cnxxn::Fctn_cnvtr_JSNDCD("Fnctn_Obtnr_Dts_accs_PST",$rcltr_dts));
	else:
		print(json_encode(array(
				"std_dts"=>2,
				"dscrp_dts"=>"ERROR"
			)));
	endif;
endif;