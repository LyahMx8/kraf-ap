<form>
	<div class="popup-inner">
		<div id="modal-body" contenteditable="true" style="height:440px;">
			<?php print($this->Cntrl_usr_pgns->vrblpst_pgn); ?>
    	</div>
		<a class="popup-close" data-popup-close="popup-1" href="#">X</a>
    	<button type="button" class="ripple stylbttnactlz">Actualizar</button>
    </div>
</form>
<script>
	$(document).ready(function(){
		tinymce.init({
			selector: '#modal-body',
			theme: 'modern',
			plugins: 'print preview fullpage code powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
			toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
			content_css: ['//fonts.googleapis.com/css?family=Lato:300,300i,400,400i','//www.tinymce.com/css/codepen.min.css']});
		$('[data-popup-close]').click(function(){
			var targeted_popup_class = $(this).attr('data-popup-close');
			$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
			fnctnajaxpcrgpg('contenedor',"<?php print(URL); ?>/UsrKraf/Usuario");
	    });
	    $(".stylbttnactlz").click(function(){
			var vrblcntnt = $('#tinymce[data-id="modal-body"]', $('#modal-body_ifr').contents()).html();
	    	fnctnajaxptcndv("rcgddts",fcntnrcltrdts("div",vrblcntnt),"<?php print(URL);?>/UsrKraf/Actlizar_Cmpltpgs");
	    });
	});
</script>