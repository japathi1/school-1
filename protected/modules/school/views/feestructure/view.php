<?php
/* @var $this FeestructureController */
/* @var $model FeeStructure */

$this->breadcrumbs=array(
	'Fee Structures'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FeeStructure', 'url'=>array('index')),
	array('label'=>'Create FeeStructure', 'url'=>array('create')),
	array('label'=>'Update FeeStructure', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FeeStructure', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeeStructure', 'url'=>array('admin')),
);
?>

<h1>View FeeStructure #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'school_id',
		'class_id',
		'fee_laabel_id',
		'amount',
		'status',
		'deleted',
		'date_entered',
		'date_modified',
		'created_by',
		'modified_by',
	),
)); ?>
