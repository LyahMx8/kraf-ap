<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php print($this->vrblttl); ?></title>
    <?php $this->vrblvwndx->fncn_trrhd(); ?>
</head>
<body>
    <?php $this->vrblvwndx->fncn_trrmn(); ?>
    <div class="contenedor">
	    <section class="cuerpo">
	    		<?php $this->vrblvwndx->fncn_trrin(); ?>
	    </section>
	    <?php $this->vrblvwndx->fncn_trrfo(); ?>
    </div>
</body>
</html>