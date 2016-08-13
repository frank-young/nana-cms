<?php

use yii\widgets\ActiveForm;
use kartik\file\FileInput;
?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

       <?php echo $form->field($model, 'file[]')->widget(FileInput::classname(), [
        'options' => ['multiple' => true],
    ]);?>
        <button type="submit" class="btn btn-success">Submit</button>

    <?php ActiveForm::end() ?>

