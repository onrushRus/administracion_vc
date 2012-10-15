<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('socio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <?php echo link_to('Listado Anterior', "socio/index?apellido=".$form->getObject()->getApellido(), array('class' => 'btn btn-primary', 'method'=>'post'))?>
                </td>
                <td>
                    <input type="submit" class="btn-success" value="Guardar" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>

<!--
<tfoot>
        <tr>
            <td colspan="2">
            &nbsp;<a href="<?php //echo url_for('socio/index') ?>">Volver a la lista de socios</a>
            <?php // if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php //echo link_to('Borrar Socio', 'socio/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
            <?php //endif; ?>
            <input type="submit" value="Save" class="btn-success" />
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php // echo $form ?>
        </tbody>
-->