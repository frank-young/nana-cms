<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Setting */

$this->title = '邮箱设置';
$this->params['breadcrumbs'][] = '设置邮箱';
?>
<div class="setting-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
