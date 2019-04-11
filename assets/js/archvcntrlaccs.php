<script src="<?php print(URL_PBL); ?>/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	fnctnajaxptcndv = function(vrbldivdestino,vrbldtscntrl,vrblurlorigen){
		$.ajax({
			url: vrblurlorigen,
			data: vrbldtscntrl,
			type: 'POST',
			beforeSend: function(){$("#"+vrbldivdestino).html("...");},
		  	success: function(vrblprdctscplt){return $('#'+vrbldivdestino).html(vrblprdctscplt);}
		});
	}
	fnctnajaxpcrgpg = function(vrbldivdestino,vrblurlorigen){
		$.ajax({
			url: vrblurlorigen,
			type: 'GET',
		  	success: function(vrblprdctscplt){return $('.'+vrbldivdestino).html(vrblprdctscplt);}
		});
	}
	fcntnrcltrdts = function(vrbltag,vrblclsslctr=""){
		var dtsnvnr={};
		switch(vrbltag){ case "input": case "select": var cntrlvrbldt=document.getElementsByTagName(vrbltag); $(cntrlvrbldt).each(function(){var id = $(this).attr('name'); dtsnvnr[id]=$(this).val();}); return dtsnvnr; break; case "form": var cntrlvrbldt=$(vrbltag+"."+vrblclsslctr); dtsnvnr=cntrlvrbldt.serialize();return dtsnvnr; break; case "button": var cntrlvrbldt=document.getElementsByName(vrblclsslctr); dtsnvnr[vrblclsslctr]=$(cntrlvrbldt).val(); return dtsnvnr; break; case "div": dtsnvnr[vrbltag]=vrblclsslctr; return dtsnvnr; break; default:console.log("ERROR");}
	}
	<?php if(ClsCntrlSnnsctr::getssn("User")): ?>
		$('li a[href="#Salir"]').click(function(){
			fnctnajaxpcrgpg('contenedor',"<?php print(URL); ?>/UsrKraf/CerrarSesion");
		});
		$('li a[href="#Perfil"]').click(function(){
			fnctnajaxpcrgpg('contenedor',"<?php print(URL); ?>/UsrKraf/Usuario");
		});
	<?php endif; ?>
	$('button[value="Nosotros"]').click(function(){
		fnctnajaxpcrgpg('contenedor',"<?php print(URL); ?>/Index/Nosotros");
	});
});
</script>