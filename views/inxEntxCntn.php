<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php require_once("head.php"); ?>
    <link rel="stylesheet" href="<?php print(URL_PBL); ?>/css/login.css">
    <?php if(file_exists(ASSETS."js/archvcntrlaccs.php")){require_once(ASSETS."js/archvcntrlaccs.php");} ?>
    <title><?php print($this->vrblttl); ?></title>
</head>
<body>
    <div id="background-image"></div>
    <form class="form inxEntx">
        <img src="<?php print(URL_PBL); ?>/post/personas/3.jpg"><br><br>
        <label for="cntrlusrnv"><span class="icon-user-tie"></span> Usuario o correo</label>
        <input type="text" id="cntrlusrnv" name="cntrlusrnv" placeholder="Usuario o correo" autofocus required><br><br>
        <label for="vrcntrlpss"><span class="icon-key2"></span> Contraseña</label>
        <input type="password" id="vrcntrlpss" name="vrcntrlpss" placeholder="Contraseña" required><br><br>
        <button type="submit" class="ripple btn-a" id="upload" value="Enviar">Ingresar</button>
        <button style="color:#009acf;width:130px;margin-top:5px;" class="ripple btn-ripple" data-ripple-color="#d3d3d3" id="delete" value="Reset">No puedo ingresar</button>
    </form>
    <div id="dv_rpstinsg"></div>
</body>
<script>
$("#upload").click(function(){
    fnctnajaxptcndv('dv_rpstinsg',fcntnrcltrdts("input"),"<?php print(URL); ?>/SingIn/Cntrl_Mtd_LogIn");
});
</script>
</html>