<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StatisticsUniqueSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statistics-unique-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'language') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'province') ?>

    <?= $form->field($model, 'device') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-turquoise']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
