    
<div class="modal hide" id="myModal">
    <div class="modal-header">
        <a href="#" class="close" data-dismiss="modal">×</a>
        <h3>Se registra una deuda!</h3>
    </div>
    <div class="modal-body">
        <p>El socio devolvió mas tarde la/s pelicula/s alquiladas
        por lo que debe abonar los días que debe. Según los
        datos, esta deuda es de: <?php echo "$ ".$deuda;?>
        (ya tiene abonado: <?php echo "$ ".$pago;?>)</p>               
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
    </div>
</div>
<script>
  $script.ready('twitter_bootstrap', function() {
    $(function(){
        $('#myModal').modal();
    })
  });
</script>
    