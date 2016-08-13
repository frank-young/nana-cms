<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticsUnique */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistics-unique-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-turquoise']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
