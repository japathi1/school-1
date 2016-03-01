<?php
/* @var $this FeestructureController */
/* @var $model FeeStructure */

$this->breadcrumbs=array(
	'Fee Structures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeeStructure', 'url'=>array('index')),
	array('label'=>'Create FeeStructure', 'url'=>array('create')),
	array('label'=>'View FeeStructure', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FeeStructure', 'url'=>array('admin')),
);
?>

<h1>Update FeeStructure <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>