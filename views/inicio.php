<header id="inicio">
    <img src="<?php print(URL_PBL); ?>/post/idea/8.jpg" alt="Kraf - Bienvenido">
    <div class="head-elem">
        <h1><a href="index.php"><img class="animated tada" src="<?php print(URL_PBL); ?>/icon/logo2.png" alt="Kraf"></a></h1>
        <h3>Agencia de Marketing y Seguridad Industrial</h3>
        <br><br style="clear:left;"><br style="clear:left;">
        <li><a href="#info1"><button class="ripple oval-btn">Ver más</button></a></li>
    </div>
</header>
<section class="content" id="info1">
    <img src="<?php print(URL_PBL); ?>/post/personas/1.jpg" alt="Desarrollo empresarial">
    <br><br><br><br>
    <h3><?php print $this->vrblvwndx->fcntn_getdtsnstrs()['cmptitlnstrs']; ?></h3>
    <p><?php print $this->vrblvwndx->fcntn_getdtsnstrs()['cmpcntndinc']; ?></p><br>
    <button value="Nosotros" class="ripple btn-a">Más Información</button><br><br><br><br>
</section>
<section class="content" id="servicios" style="padding:15px;">
    <h3>Nuestros servicios</h3>
    <div class="service">
        <h4><?php $this->vrblvwndx->fcntncnrtrlsrvcs_tip(1); ?></h4> <?php $this->vrblvwndx->fnctntrtsrvs(); ?>
    </div>
    <div class="service">
        <h4><?php $this->vrblvwndx->fcntncnrtrlsrvcs_tip(2); ?></h4> <?php $this->vrblvwndx->fnctntrtsrvs(); ?>
    </div>
</section>