<?php
/* @var $this FeeLabelController */
/* @var $model FeeLabel */

$this->breadcrumbs=array(
	'Fee Labels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeeLabel', 'url'=>array('index')),
	array('label'=>'Create FeeLabel', 'url'=>array('create')),
	array('label'=>'View FeeLabel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FeeLabel', 'url'=>array('admin')),
);
?>

<h1>Update FeeLabel <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>