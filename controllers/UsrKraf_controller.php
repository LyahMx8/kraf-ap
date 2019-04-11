<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

class UsrKraf_controller extends ClsCntrllr_AccViws{
	private $vrblmodelusr;
	private $vrblcptondt;
	private $modldtsindx;
	private $vrblcntroldtssrvcs;
	public $vrblpst_pgn;
	function __construct(){
		parent::__construct();
		$this->vrblmodelusr=new ModelObjUsr();
		$this->modldtsindx=new ModelObjIndx();
	}
	public function Usuario(){
		print('<script src="'.URL_PBL.'/plugins/tinymce/tinymce.min.js"></script>');
		if(ClsCntrlSnnsctr::getssn("User")):
			$this->vrblcntrl_viws->Cntrl_usr_dts=$this;	$this->vrblcntrl_viws->mtd_cntrlrd($this,"fmrmlrusrcntrl","Opciones - Usuario");
			print('<style>.cntrlbcgrnd{background-image:url("'.URL_PBL.'/post/idea/dashbck_2.jpeg");}</style>');
		else:
			print("<script>window.location='".URL."'</script>");
		endif;
	}
	public function CerrarSesion(){
		if(ClsCntrlSnnsctr::destry()) print('<script>window.location="'.URL.'"</script>');
	}
	public function Mstrtrtip(){
		return $this->vrblmodelusr->gettipunsr()['cmpnbmrtp'];
	}
	public function mstrt_frm_nstr(){
		$this->vrblcntrl_viws->mtd_cntrlrd($this,"frmrmlmdfcrnstr");
		print ClsCntrlSnnsctr::dscfrjsscpt($this->crgrdtsjspt());
	}
	public function mstrt_frm_init(){
		$this->vrblcntrl_viws->mtd_cntrlrd($this,"frmrmlmdfcrini");
	}
	public function mstrt_frm_srvcs(){
		$this->vrblcntrl_viws->mtd_cntrlrd($this,"frmrmlmdfcrsrvcs");
	}
	public function dts_mstr_nstrs(){
		return $this->modldtsindx->fnctntrdtsnstrs();
	}
	public function dts_srcvsxtp(){
		foreach ($this->vrblmodelusr->fcntntrttpusrs($this->vrblcntroldtssrvcs['slcsrvcs'])as$key=>$vlrdtsxtp):
			print('<button type="button" class="clstdsrvcs" data-popup-open="popup-1" name="slct_pgn-'.$vlrdtsxtp['cmpidservcicnt'].'" value="servco-'.$vlrdtsxtp['cmpidservcicnt'].'">'.$vlrdtsxtp['cmpnombservco'].'</button>');
		endforeach;
		print('<button type="button" class="clstdsrvcs">Ingrese un Nuevo Servicio...</button>');
		print('<script>$(".clstdsrvcs").click(function(){fnctnajaxptcndv("popup-control",fcntnrcltrdts("button",$(this).attr("name")),"'.URL.'/UsrKraf/Modificar_Pgcompl"); var targeted_popup_class = $(this).attr("data-popup-open");$(\'[data-popup="\' + targeted_popup_class + \'"]\').fadeIn(350);});</script>');
	}
	public function LlmrDts_Srvcs(){
		$this->vrblcntroldtssrvcs=(isset($_POST))?$_POST:array();
		try{
			switch($this->vrblcntroldtssrvcs['slcsrvcs']):
				case 1: case 2: 
					$this->vrblcntrl_viws->Cntrl_srvc_dts=$this; $this->vrblcntrl_viws->mtd_cntrlrd($this,"frmllmddtssrvcstp"); break;
				default: throw new Exception('<script>swal({ position:"top-left",type:"error",title:"Tipo de Servicio Inexistente",showConfirmButton:false,timer:900});</script>'); break;
			endswitch;
		}catch(Exception $vrblexpsrvc){
			print($vrblexpsrvc->getMessage());
		}
	}
	public function Actualizar(){
		$this->vrblcptondt=(isset($_POST))?$_POST:array();
		switch(ClsCntrlSnnsctr::getssn("User")['cmpidtpusr']):
			case 1: case 2:
				if($this->fcntnacldts($this->vrblcptondt)):
					print('<script>swal({ position:"top-left",type:"success",title:"Haz Actualizado Correctamente",showConfirmButton:false,timer:900});</script>');
				endif; break;
			default: 
				print('<script>swal({ position:"top-left",type:"info",title:"Sin Permisos",showConfirmButton:false,timer:900});</script>');
				break;
		endswitch;
	}
	private function fcntnacldts($vrbldtsrcb=array()){
		try{
			switch ($vrbldtsrcb['vbtlslctr']) {
				case 1:
					/*Inicio*/
					break;
				case 2:
					$i=0; $cptdtstrs=array();
					foreach ($vrbldtsrcb as $key => $value){
						if(empty($value)): throw new Exception('<script>swal({ position:"top-left",type:"warning",title:"Debe Ingresar Todos los Datos",showConfirmButton:false,timer:900});</script>');
						else:
							$cptdtstrs[$i]=ClsCntrlSnnsctr::Lmpr_accsnpts($value);
						endif;
						$i++;
					}
					return $this->vrblmodelusr->getdtsaclzrnstr($cptdtstrs); break;
				default:
					throw new Exception('<script>swal({ position:"top-left",type:"error",title:"Error al Actualizar los Datos",showConfirmButton:false,timer:900});</script>'); break;
			}
		}catch(Exception $expnvo){
			print $expnvo->getMessage();
		}
	}
	private function crgrdtsjspt(){
		return "PHNjcmlwdD4kKCdidXR0b25bdmFsdWU9ImFjdHVsenJfbnN0cnMiXScpLmNsaWNrKGZ1bmN0aW9uKCl7IGZuY3RuYWpheHB0Y25kdigncmNnZGR0cycsZmNudG5yY2x0cmR0cygiZm9ybSIsImNsc25zdHJscyIpLCJodHRwOi8vbG9jYWxob3N0L2tyYWZfYXAvVXNyS3JhZi9BY3R1YWxpemFyIik7IH0pOyAkKCdidXR0b25bdmFsdWU9ImFjdHVsenJfc3J2Y3MiXScpLmNsaWNrKGZ1bmN0aW9uKCl7IGZuY3RuYWpheHB0Y25kdigncmNnZGR0cycsZmNudG5yY2x0cmR0cygiZm9ybSIsImNsc3NydmNzIiksImh0dHA6Ly9sb2NhbGhvc3Qva3JhZl9hcC9Vc3JLcmFmL0FjdHVhbGl6YXIiKTsgfSk7ICQoJ3NlbGVjdFtuYW1lPSJzbGNzcnZjcyJdJykuY2hhbmdlKGZ1bmN0aW9uKCl7IGZuY3RuYWpheHB0Y25kdignZHZ0cHNydmNvJyxmY250bnJjbHRyZHRzKCJzZWxlY3QiKSwiaHR0cDovL2xvY2FsaG9zdC9rcmFmX2FwL1VzcktyYWYvTGxtckR0c19TcnZjcyIpOyB9KTsgJCgnW2RhdGEtcG9wdXAtb3Blbl0nKS5jbGljayhmdW5jdGlvbigpe2ZuY3RuYWpheHB0Y25kdigncG9wdXAtY29udHJvbCcsZmNudG5yY2x0cmR0cygiYnV0dG9uIiwkKHRoaXMpLmF0dHIoJ25hbWUnKSksImh0dHA6Ly9sb2NhbGhvc3Qva3JhZl9hcC9Vc3JLcmFmL01vZGlmaWNhcl9QZ2NvbXBsIik7IHZhciB0YXJnZXRlZF9wb3B1cF9jbGFzcyA9ICQodGhpcykuYXR0cignZGF0YS1wb3B1cC1vcGVuJyk7ICQoJ1tkYXRhLXBvcHVwPSInICsgdGFyZ2V0ZWRfcG9wdXBfY2xhc3MgKyAnIl0nKS5mYWRlSW4oMzUwKTsgfSk7PC9zY3JpcHQ+";
	}
	public function mtd_rtuntpdtssrvcs(){
		print('<select name="slcsrvcs"><option value="0">Seleccione un Tipo de Servicio...</option>');
		foreach ($this->vrblmodelusr->getdtsbytipsrvcs()as$key=>$vrbldtssrvs) {
			print('<option value="'.$vrbldtssrvs['cmpidservco'].'">'.$vrbldtssrvs['cmpnombrsrvco'].'</option>');
		}
		print("</select>");
	}
	public function Modificar_Pgcompl(){
		$vrblpstpgnslct=isset($_POST)?$_POST:array(); $this->vrblcntrl_viws->Cntrl_usr_pgns=$this;
		if(array_key_exists("slct_pgn",$vrblpstpgnslct)):
			$this->vrblpst_pgn=$this->vrblmodelusr->funtnslcstcntnd()['cmpnmbrpgn'];
		else:
			foreach($vrblpstpgnslct as$key=>$value): $vrblpstpgnslct=explode("-",$value); endforeach;
			$this->vrblpst_pgn=$this->vrblmodelusr->fnctntrcntd_srvs($vrblpstpgnslct[1])['cmpcontndsrvc'];
		endif;
		$_SESSION['c71b8145']=$vrblpstpgnslct; $this->vrblcntrl_viws->mtd_cntrlrd($this,"frmrmlmdfcpgns");
	}
	public function Actlizar_Cmpltpgs(){
		$vrblcntrlingrss=isset($_POST)?$_POST:array();
		try {
			if(array_key_exists("slct_pgn",$_SESSION['c71b8145'])):
				
				/* Se necesita al parecer permisos de Chmod especiales pero retorna falso por ahora el editar arcivhos para linux queda descartado
				$vrblarchvocmb=DIRIZ."/../views/pgncmpltnstrs.php";
				if(!is_writable($vrblarchvocmb)):
					if(!chmod($vrblarchvocmb,0666)):
						throw new Exception('<script>swal({ position:"top-left",type:"error",title:"Error de Lectura en el Archivo ('.$vrblarchvocmb.')",showConfirmButton:false,timer:900});</script>');
					endif;
				endif;
				if($fh = @fopen($vrblarchvocmb,"w+")):
						fwrite($fh, $vrblcntrlingrss['div']);
					fclose($fh);
				else:
					throw new Exception('<script>swal({ position:"top-left",type:"error",title:"Error al Actualizar la Pagina",showConfirmButton:false,timer:900});</script>');
				endif;*/
			else:
				$vrblcntrlingrss[0]=$vrblcntrlingrss['div']; unset($vrblcntrlingrss['div']); array_push($vrblcntrlingrss,$_SESSION['c71b8145'][1]);
				if($this->vrblmodelusr->funcntningrcmspgn($vrblcntrlingrss)):
					print('<script>swal({ position:"top-left",type:"success",title:"Pagina de Servicio Actualizada!",showConfirmButton:false,timer:1050});</script>');
				else:
					throw new Exception('<script>swal({ position:"top-left",type:"error",title:"Error al Actualizar la Pagina del Servicio!",showConfirmButton:false,timer:900});</script>');
				endif;
			endif;
			unset($_SESSION['c71b8145']);
		} catch (Exception $ExptCmbs){
			print($ExptCmbs->getMessage());
		}
	}
}
/*
	Password PC Monica -> lunaarley09

	
*/
