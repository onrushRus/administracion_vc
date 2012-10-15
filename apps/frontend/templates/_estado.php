<!-- Llamo Funcion del Reloj -->
      <form name="form_reloj" readonly>
        <input class="well-small" style="text-align: center"  name="reloj" readonly="readonly">
      </form>
<!-- Termina Funcion del Reloj -->
<?php if (!($sf_user->isAuthenticated())): ?>          
  <!--Comienza Div Login-->
  <div class="span3" id="login">     
        <fieldset><legend>Ingresar</legend>
          <form class="form-inline form-horizontal" action="<?php echo url_for("login/index");?>" method="POST" id="login">
                <input type="text" class="input-small" placeholder="User" name="user"></input>
                <input type="password" class="input-small" placeholder="Pass" name="pass"></input>
                <input type="submit" class="btn-success" value="Ingresar"></input>
            </form>
        </fieldset>     
  <?php else:?>                   
    <div class="well" style="font-size: small"><?php echo "<i> Hola <b>".$sf_user->getAttribute('user')."</b>, Bienvenido!</i></h3>"?>
      <br/><a href="<?php echo url_for('login/logout') ?>"><i class="icon-off"></i> Salir</a></div>       
  <?php endif;?>
  </div>