<?php
/* @var $this FeestructureController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fee Structures',
);

$this->menu=array(
	array('label'=>'Create FeeStructure', 'url'=>array('create')),
	array('label'=>'Manage FeeStructure', 'url'=>array('admin')),
);
?>

<h1>Fee Structures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
