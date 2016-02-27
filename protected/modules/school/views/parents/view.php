<?php
/* @var $this ParentsController */
/* @var $model Parents */

$this->breadcrumbs=array(
	'Parents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Parents', 'url'=>array('index')),
	array('label'=>'Create Parents', 'url'=>array('create')),
	array('label'=>'Update Parents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parents', 'url'=>array('admin')),
);
?>

<h1>View Parents #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'school',
		'child',
		'firstname',
		'lastname',
		'type',
		'parent_type',
		'email',
		'contact',
		'address_line_1',
		'address_line_2',
		'city',
		'state',
		'pincode',
		'status',
		'deleted',
		'date_entered',
		'date_modified',
		'created_by',
		'modified_by',
	),
)); ?>
