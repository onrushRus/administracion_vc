<?php /* @var $Socio Socio */ ?>
<h1 class="alert-info">Listado de Socios</h1>

<fieldset><legend>Buscar Socio</legend>
    <form class="well form-search" action="<?php echo url_for('socio/index') ?>" method="POST">
       <input type="text" data-provide="typeahead" placeholder="Apellido" name="apellido" data-source='[<?php foreach($socios as $s){echo "\"".$s->getApellido()."\"";if($socios->getPosition()< sizeof($socios) -1){echo(",");}}?>]'></input>
       <button type="submit" class="btn-success">Buscar</button>
       <button type="reset" class="btn-warning">Borrar</button>
    </form>
</fieldset>
<br>
<?php 
    $cant = sizeof($elegido);
if($cant >= 1):?>
<table class="table table-bordered">
  <thead>
    <tr>        
      <th>Dni</th>      
      <th>Apellido y Nombre</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Fecha nacimiento</th>
      <th>Usuario</th>      
      <th>Email</th>      
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($elegido as $Socio):?>
    <tr>
      <td><?php echo $Socio->getDni()?></a></td>          
      <td><?php echo $Socio->getApellido().", ".$Socio->getNombre() ?></td>      
      <td><?php echo $Socio->getDireccion() ?></td>
      <td><?php echo $Socio->getTelCel() ?></td>
      <td><?php echo $Socio->getFechaNacimiento() ?></td>
      <td><?php echo $Socio->getUsuario() ?></td>
      <td><?php echo $Socio->getEmail() ?></td>
      <td style="text-align: center;"><a href="<?php echo url_for("socio/edit?id=".$Socio->getId());?>"><i class="icon-pencil"></i></a>
                        <?php echo link_to("<i class='icon-remove-sign'></i>", 'socio/delete?id='.$Socio->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro de querer borrar los datos del Socio?'));?>
                     </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<p><i class="icon-pencil"></i> Editar los datos del socio.</p>
<p><i class="icon-remove-sign"></i> Borra los datos de un socio.</p>
<?php endif;?>
<br>
<form action="<?php echo url_for('socio/new')?>">
<button class="btn btn-primary">Nuevo Socio</button>
    <!-- <a href="<?php // echo url_for('socio/new') ?>"><i class="icon-pencil"></i>Agregar un socio nuevo</a> -->
</form>


