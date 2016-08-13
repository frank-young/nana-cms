<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'phone')->textInput() ?> -->

    <!-- <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'pubtime')->textInput() ?> -->

    <!-- <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'sns')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Send' , ['class' => 'btn btn-success js-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
