<form action="form.php" method="POST" class="form-group caja contx">
    <h3 style="text-align:center;">Contáctate con nosotros:</h3>
    <h3 class="GraciasMsg"></h3>
    <label for="email"><span class="icon-mail2"></span> Ingrese su Email</label>
    <input type="email" id="email" name="email" class="form-control" required placeholder="Ingrese su Email">
    <br><br>
    <label for="nombre"><span class="icon-user"></span> Ingrese su nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Ingrese su nombre">
    <br><br>
    <label for="tel"><span class="icon-phone"></span> Ingrese su teléfono</label>
    <input type="tel" pattern=".{7,10}" id="tel" name="tel" class="form-control" required placeholder="Telefono">
    <br><br>
    <label for="mensaje"><span class="icon-bubbles2"></span> Mensaje</label><br>
    <textarea style="height: 60px;" name="mensaje" class="form-control" required id="mensaje" rows="4" cols="30" placeholder="Mensaje..."></textarea>
    <br><br><button type="reset" style="color:#EA2D3B;width:100px;" class="ripple btn-ripple" data-ripple-color="#d3d3d3" id="delete" value="Reset" onclick="this.form.reset()">Reiniciar</button>
    <button type="submit" class="ripple btn-a" id="send" value="Enviar" onclick="formulario()">Enviar</button>
</form>