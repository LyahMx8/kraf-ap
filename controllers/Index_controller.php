<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

class Index_controller extends ClsCntrllr_AccViws{
	private $usrCtrlr;
    private $modlDtsI;
	public function __construct(){
		parent::__construct();
        $this->modlDtsI = new ModelObjIndx();
	}
	public function index(){
        $this->usrCtrlr = new UsrKraf_controller();
        $this->vrblcntrl_viws->vrblvwndx=$this; $this->vrblcntrl_viws->usrCtrlr = $this->usrCtrlr;
        $this->vrblcntrl_viws->mtd_cntrlrd($this,"index","Kraf - Agencia Publicitaria");
    }
    public function fncn_trrhd(){
    	$this->vrblcntrl_viws->mtd_cntrlrd($this,"head");
    }
    public function fncn_trrmn(){
    	$this->vrblcntrl_viws->mtd_cntrlrd($this,"menu");
    }
    public function fnctn_optns(){
        if(ClsCntrlSnnsctr::getssn("User")):
            print('<li><a href="#Perfil"><button class="ripple">Hola! '.ClsCntrlSnnsctr::getssn("User")['cmpnmbrsusr']." - ".$this->usrCtrlr->Mstrtrtip().'</button></a></li>');
        else:
            print('<li><a href="#"><button style="height:70px;border-bottom:2px solid #242424" class="ripple" data-ripple-color="#d3d3d3"><img style="height:90%;padding-top:5px;" src="'.URL_PBL.'/icon/logo2.png" alt="Kraf"></button></a></li>');
        endif;
    }
    public function fncn_trrin(){
    	$this->vrblcntrl_viws->mtd_cntrlrd($this,"inicio");
    }
    public function fncn_trrfo(){
    	$this->vrblcntrl_viws->mtd_cntrlrd($this,"footer");
    }
    public function fcntn_getdtsnstrs(){
        return $this->modlDtsI->fnctntrdtsnstrs();
    }
    public function fcntncnrtrlsrvcs_tip($vrbltipsrcv){
        print ($this->modlDtsI->fnctontrdtstipsrvc($vrbltipsrcv)['cmpnombrsrvco']);
    }
    public function fnctntrtsrvs(){
        foreach($this->modlDtsI->fcntngetservcos()as$accsun=>$vrblcndts) {
            print('<a href=""><div class="box"><span class="'.$vrblcndts['cmpclsiconserv'].'"></span><br>'.$vrblcndts['cmpnombservco'].'</div></a>');
        }
    }
    public function Nosotros(){
        $this->vrblcntrl_viws->mtd_cntrlrd($this,"pgncmpltnstrs");
    }
}