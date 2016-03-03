<?php
/* @var $this ExtrafeeController */
/* @var $model ExtraFee */

$this->breadcrumbs=array(
	'Extra Fees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExtraFee', 'url'=>array('index')),
	array('label'=>'Manage ExtraFee', 'url'=>array('admin')),
);
?>

<h1>Create ExtraFee</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>