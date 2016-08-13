<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InquirySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'pubtime') ?>

    <?php // echo $form->field($model, 'facebook') ?>

    <?php // echo $form->field($model, 'twitter') ?>

    <?php // echo $form->field($model, 'sns') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'page') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
