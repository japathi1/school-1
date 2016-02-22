<?php
/* @var $this SchoolChargesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'School Charges',
);

$this->menu=array(
	array('label'=>'Create SchoolCharges', 'url'=>array('create')),
	array('label'=>'Manage SchoolCharges', 'url'=>array('admin')),
);
?>

<h1>School Charges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
