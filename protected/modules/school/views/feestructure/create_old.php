<?php
/* @var $this FeestructureController */
/* @var $model FeeStructure */

$this->breadcrumbs=array(
	'Fee Structures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeeStructure', 'url'=>array('index')),
	array('label'=>'Manage FeeStructure', 'url'=>array('admin')),
);
?>

<h1>Create FeeStructure</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>