<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'webtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'copyright')->textInput(['maxlength' => true]) ?>

    <?php /*$form->field($model, 'admin_email')->textInput(['maxlength' => true])*/ ?>

    <?= $form->field($model, 'webdesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'google')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'robots')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存' , ['class' => 'btn btn-turquoise']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
