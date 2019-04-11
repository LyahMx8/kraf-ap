<?php 

/*
* Estas son Constantes
*/

define('URL','http://'.$_SERVER['DOCUMENT_ROOT'].'/kraf_ap');
define('LIBS','libs/');
define('MODELS','models/');
define('ASSETS','assets/');
define('DIRIZ',dirname(__FILE__));
define('URL_PBL','http://'.$_SERVER['HTTP_HOST'].'/kraf_ap/'.ASSETS);

define('CTRL_HST','localhost');
define('CTRL_NME','root');
define('CTRL_PAS','');
define('CTRL_DBN','cmskrafdb');

define('CNTL_NCRYP', 'sha512');
define('CNTL_NCRYP_KY', 'my_key');
define('CNTL_NCRYP_SCRT', 'my_secret');
define('CNTL_NCRYP_WRD', 'so_secret');

function fnctntrctflzcmpl(){
	date_default_timezone_set("America/Bogota");
	if((date("m-d")=="05-31") || (date("m-d")=="01-01"))
		print('<script>swal("Deseale Feliz Cumpleaños al Programador!!","","success");</script>');
}