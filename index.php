<?php

require_once((dirname(__FILE__)."/includes/ArchvConfg.php"));

$vrblcntrlurl=(isset($_GET["url"])) ? $_GET["url"] : "Index/index";
$vrblcntrlurl=explode("/",$vrblcntrlurl);
$vrblcntrllr=(isset($vrblcntrlurl[0]))?$vrblcntrlurl[0]."_controller":"Index_controller";
$vrblcntmthd=(isset($vrblcntrlurl[1]))?$vrblcntrlurl[1]:"index";
$vrblcntprmt=(isset($vrblcntrlurl[2]) && !is_null($vrblcntrlurl[2]))?$vrblcntrlurl[2]:null;

spl_autoload_register(function($cls){
	if(file_exists(LIBS.$cls.".php")) require(LIBS.$cls.".php");
	else if(file_exists(MODELS.$cls.".php")) require(MODELS.$cls.".php");
});

$vrblpath = "controllers/".$vrblcntrllr.".php";
if(file_exists($vrblpath)) {
	require($vrblpath); 
	$vrblcntrllr= new $vrblcntrllr();
	if(method_exists($vrblcntrllr,$vrblcntmthd)){
		if(!is_null($vrblcntprmt)) $vrblcntrllr->{$vrblcntmthd}($vrblcntprmt);
		else $vrblcntrllr->{$vrblcntmthd}();
	}
	else{header("Location: ".URL);}
}
else{include_once("views/404.php");}