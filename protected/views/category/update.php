<?php
/* @var $this CategoryController */
/* @var $model Category */
?>

<?php
/* $this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
); */

$this->menu=array(
	//array('label'=>'List Category', 'url'=>array('index')),
	//array('label'=>'Create Category', 'url'=>array('create')),
	//array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'ลบหมวดคำศัพท์', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'ท่านแน่ใจหรือไม่ที่ต้องการลบหมวดของคำศัพท์นี้?')),
	array('label'=>'กลับสู่หน้าจัดการหมวดคำศัพท์', 'url'=>array('admin')),
);
?>

    <h1>แก้ไขหมวดของคำศัพท์ หมวด: <?php echo $model->cat_name; ?></h1>

<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'category-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

    <p>กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย( * )ให้ครบถ้วน</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'cat_name',array('span'=>5,'maxlength'=>255)); ?>


    <?php //echo $form->textFieldControlGroup($model,'img_id',array('span'=>5)); ?>

    <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
            'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
            'size'=>TbHtml::BUTTON_SIZE_LARGE,
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->