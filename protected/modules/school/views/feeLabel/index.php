<?php
/* @var $this FeeLabelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fee Labels',
);

$this->menu=array(
	array('label'=>'Create FeeLabel', 'url'=>array('create')),
	array('label'=>'Manage FeeLabel', 'url'=>array('admin')),
);
?>

<h1>Fee Labels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
