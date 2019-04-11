<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>404 página no encontrada - Kraf!</title>
    <?php include("head.php"); ?>
    <style>
        .cuerpo404{background:rgba(45,48,58,1);background:-moz-linear-gradient(top,rgba(45,48,58,1) 0,rgba(45,48,58,1) 14%,rgba(0,92,122,1) 55%,rgba(193,206,212,1) 90%,rgba(193,206,212,1) 100%);background:-webkit-gradient(left top,left bottom,color-stop(0%,rgba(45,48,58,1)),color-stop(14%,rgba(45,48,58,1)),color-stop(55%,rgba(0,92,122,1)),color-stop(90%,rgba(193,206,212,1)),color-stop(100%,rgba(193,206,212,1)));background:-webkit-linear-gradient(top,rgba(45,48,58,1) 0,rgba(45,48,58,1) 14%,rgba(0,92,122,1) 55%,rgba(193,206,212,1) 90%,rgba(193,206,212,1) 100%);background:-o-linear-gradient(top,rgba(45,48,58,1) 0,rgba(45,48,58,1) 14%,rgba(0,92,122,1) 55%,rgba(193,206,212,1) 90%,rgba(193,206,212,1) 100%);background:-ms-linear-gradient(top,rgba(45,48,58,1) 0,rgba(45,48,58,1) 14%,rgba(0,92,122,1) 55%,rgba(193,206,212,1) 90%,rgba(193,206,212,1) 100%);background:linear-gradient(to bottom,rgba(45,48,58,1) 0,rgba(45,48,58,1) 14%,rgba(0,92,122,1) 55%,rgba(193,206,212,1) 90%,rgba(193,206,212,1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2d303a',endColorstr='#c1ced4',GradientType=0);text-align:center;}
        #Texto{margin-top:10%;position:absolute;width:100%;left:0;}
        #Texto p,#Texto h3,#Texto a{color:#fff;}#Texto h3{text-shadow: 2px 2px 2px rgba(150, 150, 150, 1);}#Texto p{font-size:1.5em;}
        footer{border:none;}
    </style>
</head>
<body>
    <?php include("menu.php"); ?>
    <section class="cuerpo404" id="particles-js">
        <div id="Texto">
            <p>Error</p>
            <h3 style="font-size:10em;">404</h3>
            <p>Lo sentimos, la página que estabas buscando no se encuentra.</p><br>
            <button onclick="location.href='<?php print(URL); ?>'" class="ripple oval-btn">Volver</button>
        </div>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>