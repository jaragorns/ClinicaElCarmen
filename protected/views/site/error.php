<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error">
<<<<<<< HEAD
<?php echo CHtml::encode($message);
Yii::app()->user->setFlash('error','Ha ocurrido un error, contacta al administrador del sistema'); ?>
=======
<?php echo CHtml::encode($message); 
Yii::app()->user->setFlash('error','Ha ocurrido un error, contacte al administrador del sistema.');
?>
>>>>>>> bd94441a1cc78c0f5250b81086296d467ccd447c
</div>