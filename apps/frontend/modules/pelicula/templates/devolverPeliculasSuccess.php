<h1 class="alert-info">Devolución de peliculas</h1><br><br>

<?php //echo $dias; 
   $faltaPagar = ($dias*8);
   if($dias > 1):?>
        <?php if ($faltaPagar != $precio):?>
                <?php $faltaPagar = (($dias - 1)*$precio);
                   include_partial('modal',array("pago" => $precio,"deuda" => $faltaPagar));?> 
                <?php $faltaPagar = $faltaPagar + $precio?>
                <form method="POST" action="<?php echo url_for('pelicula/abonarDeuda?id='.$idAlq."&monto=".$faltaPagar)?>">                
                    <input class="btn btn-success" type="submit" name="Abonar">
                </form>                        
        <?php else:?>
            <fieldset><legend><strong>Mje. al usuario</strong></legend>
                <h3 class="alert-success"><?php echo $mje_ok ?></h3>
            </fieldset>
        <?php endif;?>
   <?php else:?>
      <fieldset><legend><strong>Mje. al usuario</strong></legend>
          <h3 class="alert-success"><?php echo $mje ?></h3>
      </fieldset>
<?php endif;?>
   