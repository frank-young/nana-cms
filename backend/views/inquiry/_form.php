<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Inquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true])->label('询盘接收邮箱') ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-turquoise']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
