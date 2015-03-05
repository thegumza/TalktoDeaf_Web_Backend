<?php
/* @var $this DescriptionController */
/* @var $model Description */
?>

<?php
$this->breadcrumbs=array(
	'Descriptions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Description', 'url'=>array('index')),
	array('label'=>'Create Description', 'url'=>array('create')),
	array('label'=>'Update Description', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Description', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Description', 'url'=>array('admin')),
);
?>

<h1>View Description #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'des_name',
	),
)); ?>