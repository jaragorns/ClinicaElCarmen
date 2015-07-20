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

<?php
 
echo CHtml::encode($message);
Yii::app()->user->setFlash('error','Ha ocurrido un error, contacta al administrador del sistema'); 

?>
</div>