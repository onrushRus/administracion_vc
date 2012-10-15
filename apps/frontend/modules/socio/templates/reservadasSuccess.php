<?php /* @var $peli Reservas */ ?>
<h1 class="alert-info">Peliculas Reservadas por el socio</h1><br><br>

<?php $cant = sizeof($reservas);
if($cant >= 1):?>

 <table class="table table-bordered">
    <thead>
        <tr>        
        <th>Id</th>            
        <th>Titulo</th>  
        <th>Fecha Reserva</th>
        <th>Hora Reserva</th>
        <th>Eliminar Reserva</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservas as $peli):?>
          <tr>
            <td><?php echo $peli->getPelicula()->getId()?></a></td>
            <td><?php echo $peli->getPelicula()->getTitulo()?></a></td>
            <td><?php echo $peli->getFechaReserva('d-m-Y')?></a></td>
            <td><?php echo $peli->getHoraReserva()?></a></td>
            <td><?php echo link_to("<i class='icon-remove-sign'></i>", 'socio/borrarReservas?id='.$peli->getId().'&pel_id='.$peli->getPeliculaId(), array('method' => 'post', 'confirm' => 'Estas seguro de queres borrar la reserva?')) ?></td>
            
          </tr>
        <?php endforeach;?>
    </tbody>
 </table>
<?php else:?>
    <h3>El Socio no registra ninguna reserva</h3>
<?php endif;?>
    

