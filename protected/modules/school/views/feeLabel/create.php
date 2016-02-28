<?php
/* @var $this FeeLabelController */
/* @var $model FeeLabel */

$this->breadcrumbs=array(
	'Fee Labels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FeeLabel', 'url'=>array('index')),
	array('label'=>'Manage FeeLabel', 'url'=>array('admin')),
);
?>

<h1>Create FeeLabel</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>