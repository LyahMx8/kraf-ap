<form class="form frmcntrl clsnstrls">
	<div class="clsmstrclr"><h5>Editar Nosotros</h5></div>
	<input type="hidden" name="vbtlslctr" value="2">
	<div class="clsubcninpt">
		<input type="text" value="<?php print $this->Cntrl_usr_dts->dts_mstr_nstrs()['cmptitlnstrs']; ?>" name="vrltlnstrs" placeholder="Titulo" required>
		<textarea name="vrlcntrlcprnstrs" class="clscntrltmxtrs" placeholder="Cuerpo" required><?php print $this->Cntrl_usr_dts->dts_mstr_nstrs()['cmpcntndinc']; ?></textarea>
	</div>
	<div class="clscntrlubcn">
		<button type="button" class="ripple btn-a" value="actulzr_nstrs">Actualizar</button>&nbsp;<button type="button" class="ripple btn-a" data-popup-open="popup-1" name="slct_pgn" value="nosotros">Actualizar Pagina Nosotros</button> 
	</div>
</form>