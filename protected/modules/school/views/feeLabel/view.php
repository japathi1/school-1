<?php
/* @var $this FeeLabelController */
/* @var $model FeeLabel */

$this->breadcrumbs=array(
	'Fee Labels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FeeLabel', 'url'=>array('index')),
	array('label'=>'Create FeeLabel', 'url'=>array('create')),
	array('label'=>'Update FeeLabel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FeeLabel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeeLabel', 'url'=>array('admin')),
);
?>

<h1>View FeeLabel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'school_id',
		'fee_label',
		'status',
		'deleted',
		'date_entered',
		'date_modified',
		'created_by',
		'modified_by',
	),
)); ?>
