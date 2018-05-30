<?php
/* @var $this FacturasController */
/* @var $model Facturas */
/* @var $form CActiveForm */
?>

<?php $row_id = "item-" . $key ?>
<div class='row-fluid' id="<?php echo $row_id ?>">
    <?php
    echo $form->hiddenField($model, "[$key]id_inventario");
    echo $form->updateTypeField($model, $key, "id_inventario", array('key' => $key));
    ?>
    <div class="span3">
        <?php
        echo $form->labelEx($model, "[$key]cantidad");
        echo $form->textField($model, "[$key]cantidad");
        echo $form->error($model, "[$key]cantidad");
        ?>
 
    </div>
 
    <div class="span3">
        <?php
        echo $form->labelEx($model, "[$key]precio_compra");
        echo $form->textField($model, "[$key]precio_compra");
        echo $form->error($model, "[$key]precio_compra");
        ?>
    </div>
 
    <div class="span3">
        <?php
        /*echo $form->labelEx($model, "[$key]schedule");
 
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => "[$key]schedule",
            'options' => array(
                'showAnim' => 'fold',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        echo $form->error($model, "[$key]schedule");
        */
        ?>
 
 
    </div>
    <div class="span2">
 
            <?php echo $form->deleteRowButton($row_id, $key); ?>
        </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type=text]').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    });
</script>