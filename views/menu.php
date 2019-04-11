<div class="menu"></div>
    <nav>
        <ul class="menu1">
            <li class="hamburguer"><a href="#"><button style="height:70px;" class="ripple bt-menu"><span class="icon-menu"></span></button></a></li>
            <li><a href=""><button class="ripple"><span class="icon-home"></span></button></a></li>
            <li><a href=""><button class="ripple"><span class="icon-info"></span></button></a></li>
            <li><a href=""><button class="ripple"><span class="icon-library"></span></button></a></li>
            <li><a href=""><button class="ripple"><span class="icon-bubbles2"></span></button></a></li>
            <li><a href=""><button class="ripple"><span class="icon-compass"></span></button></a></li>
        </ul>
        <ul class="menu2">
            <?php fnctntrctflzcmpl();  $this->vrblvwndx->fnctn_optns(); ?>
            <li><a href="#header"><button class="ripple" data-ripple-color="#d3d3d3">Inicio</button></a></li>
            <li><a href="#info"><button class="ripple" data-ripple-color="#d3d3d3">Sobre Nosotros</button></a></li>
            <li class="submenu">
                <a href="#catalogo"><button class="ripple" data-ripple-color="#d3d3d3">Servicios ▼</button></a>
                <section class="children">
                    <li><a href="#producto1"><button class="ripple" data-ripple-color="#d3d3d3">Agencia Publicitaria</button></a></li>
                    <li><a href="#producto2"><button class="ripple" data-ripple-color="#d3d3d3">Seguridad Industrial</button></a></li>
                </section>
            </li>
            <li><a href="#contacto"><button class="ripple" data-ripple-color="#d3d3d3">Contacto</button></a></li>
            <?php if(ClsCntrlSnnsctr::getssn("User")): ?><li><a href="#Salir"><button class="ripple ingresar-btn" data-ripple-color="#d3d3d3">Salir</button></a></li><?php endif ?>
            <div class="redes">
                <br><br>
                <li>
                    <a href="https://twitter.com/" target="_blank"><span class="icon-span icon-twitter"></span></a>
                    <a href="https://facebook.com/" target="_blank"><span class="icon-span icon-facebook2"></span></a>
                    <a href="https://instagram.com/" target="_blank"><span class="icon-span icon-instagram"></span></a>
                    <a href="https://linkedin.com/" target="_blank"><span class="icon-span icon-linkedin"></span></a>
                </li>
            </div>
        </ul>
    </nav>