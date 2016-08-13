<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '添加管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <p>请填写以下信息:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->label('用户名') ?>

                <?= $form->field($model, 'email')->label('邮箱') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

                <div class="form-group">
                    <?= Html::submitButton('创建', ['class' => 'btn btn-turquoise', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
