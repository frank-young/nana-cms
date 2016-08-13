<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Cate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cName')->textInput(['maxlength' => true])->label('分类名称') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-turquoise' : 'btn btn-pink']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
